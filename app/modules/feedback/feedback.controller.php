<?php

class FeedbackController extends BaseController {

    public static $name = 'feedback';
    public static $group = 'feedback';

    /****************************************************************************/

    ## Routing rules of module
    public static function returnRoutes($prefix = null) {
        $class = __CLASS__;
    	Route::post("/contacts/feedback",array('as' => 'contact_feedback','uses' => $class."@postContactFeedback"));
    }

    /****************************************************************************/
    
	public function __construct() {

        $this->module = array(
            'name' => self::$name,
            'group' => self::$group,
            #'rest' => self::$group."/actions",
            #'tpl' => static::returnTpl('admin/actions'),
            'gtpl' => static::returnTpl(),
        );
        View::share('module', $this->module);
	}

    public function postContactFeedback() {

        if(!Request::ajax()) return App::abort(404);
        $json_request = array('status'=>FALSE, 'responseText'=>'','responseErrorText'=>'','redirect'=>FALSE);
        $validation = Validator::make(Input::all(), array('fio'=>'required', 'email'=>'required|email', 'phone'=>'required', 'content'=>'required'));
        if($validation->passes()):
            $this->postSendmessage(Input::get('email'), array('subject'=>'Форма обратной связи','email'=>Input::get('email'),'name'=>Input::get('fio'),'content'=>Input::get('content')));
            $json_request['responseText'] = 'Сообщение отправлено';
            $json_request['status'] = TRUE;
        else:
            $json_request['responseText'] = 'Неверно заполнены поля';
            $json_request['responseErrorText'] = implode($validation->messages()->all(), '<br />');
        endif;
        return Response::json($json_request, 200);
    }
    
    public function postSendmessage($email = null, $data = null, $template = 'feedback') {

        return  Mail::send($this->module['gtpl'].$template,$data, function ($message) use ($email, $data) {
            $message->from($email, @$data['name']);
            $message->to(Config::get('mail.feedback_mail'), Config::get('mail.feedback_name'))->subject(@$data['subject']);
        });
    }
}


