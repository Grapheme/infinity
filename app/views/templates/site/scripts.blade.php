@if(Config::get('app.use_scripts_local'))
	{{HTML::script('js/vendor/jquery.min.js');}}
@else
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery.min.js');}}"><\/script>')</script>
@endif

	{{HTML::script('js/system/main.js');}}
	{{HTML::script('js/vendor/SmartNotification.min.js');}}
	{{HTML::script('js/vendor/jquery.validate.min.js');}}
	{{HTML::script('js/system/app.js');}}
	{{HTML::script('js/system/messages.js');}}

	{{HTML::script('theme/js/plugins.js');}}
	<script type="text/javascript">
		if(typeof runFormValidation === 'function'){
			loadScript("{{asset('js/vendor/jquery-form.min.js');}}",runFormValidation);
		}else{
			loadScript("{{asset('js/vendor/jquery-form.min.js');}}");
		}
	</script>


    {{ HTML::script("theme/js/vendor/jquery.sumoselect.min.js") }}
    <script>
        $('.customSelect.selectModel').SumoSelect({placeholder: 'Модель'});
        $('.customSelect.selectYear').SumoSelect({placeholder: 'Год'});
    </script>


	{{HTML::script('theme/js/app.js');}}

    <style>
    .state-error input, .state-error select, .state-error textarea, .state-error .CaptionCont {
        border: 1px solid #633E7C !important;
        background-color: #E9D9F3 !important;
    }
    em.invalid {
        display: none !important;
    }
    </style>

    <!-- !ALL ANALYTICS! -->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-17193616-15', 'auto');
      ga('send', 'pageview');

    </script>

    <div id="carfinPrice"><!-- --></div>
    <script type="text/javascript">
        (function() {
        var carfinParam = {
        'partner': 688,
        'htmlPrice': 'carfinPrice',
        'positionAlign': 'left',
        'positionTop': 50,
        'tpl': 14
        };
        var carfinScript = document.createElement('script');
        carfinScript.type = 'text/javascript';
        carfinScript.async = true;
        carfinScript.charset = 'utf-8';
        carfinScript.src = (("https:" == document.location.protocol) ?"https://" :"http://") + 'car-fin.ru/widget/price.js';
        var carfinScriptDone = false;
        carfinScript.onload = carfinScript.onreadystatechange = function() {
        if (!carfinScriptDone
        && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")
        && typeof(carfinCalculator) == 'object') {
        carfinScriptDone = true;
        carfinCalculator.run(carfinParam);
        }
        }
        var firstScript = document.getElementsByTagName('script')[0];
        firstScript.parentNode.insertBefore(carfinScript, firstScript);
        })();
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter27506610 = new Ya.Metrika({id:27506610,
                        webvisor:true,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
    </script>
    <link href="https://clients.streamwood.ru/StreamWood/sw.css" rel="stylesheet" type="text/css" /> <script type="text/javascript" src="https://clients.streamwood.ru/StreamWood/sw.js" charset="utf-8"></script> <script type="text/javascript"> swQ(document).ready(function(){ swQ().SW({ swKey: '5b6479f4c44f84b3573414c87f869185', swDomainKey: '6d64c2e167d188219ba9b83f397a46a5' }); swQ('body').SW('load'); }); </script>
    <noscript><div><img src="//mc.yandex.ru/watch/27506610" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->