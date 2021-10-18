<style>
    a.obl {
        position: absolute;
        /* Абсолютное позиционирование */
        top: 40px;
        /* Положение от нижнего края */
        right: 15px;
        display: block;
        color: #ED5B00;
        text-decoration: none;
        margin: 20px auto;
        text-align: center;
        width: 125px;
        font-family: verdana;
        font-size: 22px;
        letter-spacing: 2px;
        border-bottom: 2px solid transparent;
    }

    a.obl:hover,
    a.obl:focus {
        outline: none;
        border-bottom: 2px solid #eee;
    }

    a.obl::before,
    a.obl:after {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 70px;
        height: 70px;
        border: 12px double rgba(0, 0, 0, 0.1);
        border-radius: 50%;
        content: '';
        opacity: 0;
        -webkit-transform: translateX(-50%) translateY(-50%) scale(0.2);
        -moz-transform: translateX(-50%) translateY(-50%) scale(0.2);
        transform: translateX(-50%) translateY(-50%) scale(0.2);
    }

    a.obl:after {
        width: 60px;
        height: 60px;
        border-width: 6px;
        -webkit-transform: translateX(-50%) translateY(-50%) scale(0.8);
        -moz-transform: translateX(-50%) translateY(-50%) scale(0.8);
        transform: translateX(-50%) translateY(-50%) scale(0.8);
    }

    a.obl:hover:before,
    a.obl:hover:after {
        -webkit-animation: pulsate 1.2s infinite;
        -moz-animation: pulsate 1.2s infinite;
        -ms-animation: pulsate 1.2s infinite;
        animation: pulsate 1.2s infinite;
    }

    @-webkit-keyframes pulsate {

        30% {
            opacity: 1;
            -webkit-transform: translateX(-50%) translateY(-50%) scale(1);
        }

        100% {
            opacity: 0.3;
            -webkit-transform: translateX(-50%) translateY(-50%) scale(0.5);
        }

    }

    @-moz-keyframes pulsate {

        30% {
            opacity: 1;
            -moz-transform: translateX(-50%) translateY(-50%) scale(1);
        }

        100% {
            opacity: 0.3;
            -moz-transform: translateX(-50%) translateY(-50%) scale(0.5);
        }

    }

    @-ms-keyframes pulsate {

        30% {
            opacity: 1;
            -ms-transform: translateX(-50%) translateY(-50%) scale(1);
        }

        100% {
            opacity: 0.3;
            -ms-transform: translateX(-50%) translateY(-50%) scale(0.5);
        }

    }

    @-keyframes pulsate {

        30% {
            opacity: 1;
            transform: translateX(-50%) translateY(-50%) scale(1);
        }

        100% {
            opacity: 0.3;
            transform: translateX(-50%) translateY(-50%) scale(0.5);
        }
    }
</style>

<a href="#" class="obl">Назад</a>
<h2>Hello world</h2>
<p>Под узлом «Зависимости» расположен непосредственно сам файл кода программы —&nbsp;Program.cs. Как раз он и открыт в центральном окне. Вначале разберёмся, что весь этот код собой представляет:</p>
<pre class="csharp" style="font-family:monospace;"><span style="color: #0600FF;font-weight: bold;">using</span> <span style="color: #008080;">System</span><span style="color: #008000;">;</span>
&nbsp;
<span style="color: #0600FF;font-weight: bold;">namespace</span> HelloWorld
<span style="color: #008000;">{</span>
    <span style="color: #6666cc;font-weight: bold;">class</span> Program
    <span style="color: #008000;">{</span>
        <span style="color: #0600FF;font-weight: bold;">static</span> <span style="color: #6666cc;font-weight: bold;">void</span> Main<span style="color: #008000;">(</span><span style="color: #6666cc;font-weight: bold;">string</span><span style="color: #008000;">[</span><span style="color: #008000;">]</span> args<span style="color: #008000;">)</span>
        <span style="color: #008000;">{</span>
            Console<span style="color: #008000;">.</span><span style="color: #0000FF;">WriteLine</span><span style="color: #008000;">(</span><span style="color: #666666;">"Hello World!"</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span>
        <span style="color: #008000;">}</span>
    <span style="color: #008000;">}</span>
<span style="color: #008000;">}</span>
</pre>
<p>В начале файла мы видим директиву&nbsp;using, после которой идёт название подключаемого пространства имён.&nbsp;Пространства имён&nbsp;необходимы для организации классов в общие блоки. Например, в первой строке&nbsp;подключается пространство имён System, которое содержит фундаментальные и базовые классы платформы .NET.</p>
<p>C# имеет C-подобный синтаксис, и каждая строка завершается точкой с запятой, а каждый блок кода помещается в фигурные скобки. Далее начинается уже наше пространство имён HelloWorld, которое будет создавать отдельную сборку или исполняемую программу. Сначала идёт ключевое слово&nbsp;namespace, после которого следует название пространства имён. По умолчанию Visual Studio даёт ему название проекта. Далее внутри фигурных скобок идёт блок пространства имён.</p>
<p>Пространство имён может включать другие пространства или классы. В нашем случае по умолчанию сгенерирован один класс — Program. Классы объявляются похожим способом: сначала идёт ключевое слово&nbsp;class, а потом название класса, и далее блок самого класса в фигурных скобках.</p>
<p>Класс может содержать различные переменные, методы, свойства, прочие инструкции. В данном случае объявлен один метод Main. В программе на C# метод Main является входной точкой программы, с него начинается всё управление. Это обязательный элемент любой программы.</p>
<p>Слово&nbsp;static&nbsp;указывает, что метод Main статический, а слово&nbsp;void&nbsp;— что он не возвращает никакого значения. Далее в скобках у нас идут параметры метода.&nbsp;string[] args&nbsp;— это массив с именем args, который хранит значения типа&nbsp;string, то есть строки. В данном случае они нам пока не нужны, но в реальной программе это те параметры, которые передаются при запуске программы из консоли.</p>
<p>Внутри метода располагаются действия, которые этот метод выполняет. По умолчанию он содержит одно действие:&nbsp;Console.WriteLine("Hello World!");&nbsp;- выводит в консоль строку "Hello World!".</p>
<p>Теперь мы можем запустить программу на выполнение с помощью клавиши F5 или с панели инструментов, нажав на зелёную стрелку. И если вы все сделали правильно, то при запуске приложения увидите заветную строку.</p>
<p><img src="https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9304/retina-272e55ae74b3f3127c2c43a50dcac45f.png" style="width: 800px;height: 379px;"></p>
<h2>Интерактивное приложение на C#</h2>
<p>Теперь сделаем всё поинтересней —&nbsp;изменим код на следующий:</p>
<pre class="csharp" style="font-family:monospace;"><span style="color: #0600FF;font-weight: bold;">using</span> <span style="color: #008080;">System</span><span style="color: #008000;">;</span>
&nbsp;
<span style="color: #0600FF;font-weight: bold;">namespace</span> HelloWorld
<span style="color: #008000;">{</span>
    <span style="color: #6666cc;font-weight: bold;">class</span> Program
    <span style="color: #008000;">{</span>
        <span style="color: #0600FF;font-weight: bold;">static</span> <span style="color: #6666cc;font-weight: bold;">void</span> Main<span style="color: #008000;">(</span><span style="color: #6666cc;font-weight: bold;">string</span><span style="color: #008000;">[</span><span style="color: #008000;">]</span> args<span style="color: #008000;">)</span>
        <span style="color: #008000;">{</span>
            Console<span style="color: #008000;">.</span><span style="color: #0000FF;">Write</span><span style="color: #008000;">(</span><span style="color: #666666;">"Введите свое имя: "</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span>
            <span style="color: #6666cc;font-weight: bold;">string</span> name <span style="color: #008000;">=</span> Console<span style="color: #008000;">.</span><span style="color: #0000FF;">ReadLine</span><span style="color: #008000;">(</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span>
            Console<span style="color: #008000;">.</span><span style="color: #0000FF;">WriteLine</span><span style="color: #008000;">(</span>$<span style="color: #666666;">"Привет {name}"</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span>   
        <span style="color: #008000;">}</span>
    <span style="color: #008000;">}</span>
<span style="color: #008000;">}</span></pre>
<p>По сравнению с автоматически сгенерированным кодом были внесены несколько изменений. Теперь в методе Main первой строкой выводится приглашение к вводу.</p>
<p>Класс Console, метод которого мы вызываем, находится в пространстве имён System. Это пространство подключено в начале с помощью директивы using. Без подключения пространства имён System невозможно было бы использовать класс Console.</p>
<p>Однако нам необязательно подключать пространство имён. Мы можем даже удалить первую строку, но в этом случае мы тогда должны будем указать полный путь до используемого класса:</p>
<pre class="csharp" style="font-family:monospace;"><span style="color: #000000;">System</span><span style="color: #008000;">.</span><span style="color: #0000FF;">Console</span><span style="color: #008000;">.</span><span style="color: #0000FF;">Write</span><span style="color: #008000;">(</span><span style="color: #666666;">"Введите свое имя: "</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span></pre>
<p>Во второй строке определяется строковая переменная name (тип string), в которую пользователь вводит информацию с консоли:</p>
<pre class="csharp" style="font-family:monospace;"><span style="color: #6666cc;font-weight: bold;">string</span> name <span style="color: #008000;">=</span> Console<span style="color: #008000;">.</span><span style="color: #0000FF;">ReadLine</span><span style="color: #008000;">(</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span></pre>
<p>Мы обозначили, что помощью метода <strong>ReadLine</strong>()&nbsp;можем считать с консоли строку.</p>
<p>Затем введённое имя выводится на консоль:</p>
<pre class="csharp" style="font-family:monospace;">Console<span style="color: #008000;">.</span><span style="color: #0000FF;">WriteLine</span><span style="color: #008000;">(</span>$<span style="color: #666666;">"Привет {name}"</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span> </pre>
<p>Чтобы задать вывод значения переменной name в выводимой на консоль строке, применяются фигурные скобки {}. При выводе строки на консоль выражение&nbsp;{name}&nbsp;будет заменяться на значение переменной name — введённое имя.</p>
<p>Знак доллара ($) обозначает, что внутри строки таким образом можно выводить значения переменных. Теперь протестируем проект, запустив его выполнение.</p>
<p><img src="https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9300/retina-91d1eaff3abb47683db4692676c5ff42.png" style="width: 800px;height: 418px;"></p>
<p>Поздравляю, мы создали первое приложение! Исполняемый файл вы можете найти на жёстком диске в папке проекта в каталоге&nbsp;bin/Debug. Оно будет называться так же, как проект, и иметь расширение .exe. Этот файл можно запускать без Visual Studio, а также переносить для доработки на другие компьютеры, где есть .NET Core.</p>
<div class="blogpost-content content_text content js-mediator-article" ng-non-bindable="" itemprop="articleBody" content="<h2><img alt=&quot;&quot; src=&quot;https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9307/retina-6cb04c286fbecfdd2924cfb1765389ec.png&quot;></h2>

<h2>IDE</h2>

<p>Что же нам нужно для создания первого приложения? Во-первых, нужен текстовый редактор, в котором мы будем писать исходный код. Во-вторых, нам понадобится компилятор, который преобразует исходный код в исполняемый файл (например, .exe-файл в операционной системе Windows). В-третьих, нужен фреймворк .NET, который необходим для компиляции и запуска приложения —&nbsp;о фреймворке .NET мы говорили в <a href=&quot;https://geekbrains.ru/posts/yazyk-programmirovaniya-c-sharp-istoriya-specifika-mesto-na-rynke?from=post&quot;>предыдущей статье</a>.</p>

<p>Все элементы, необходимые для создания первого приложения, объединены в специальной программе IDE (англ. Integrated Development Environment), а именно:</p>

<ul>
	<li>Кодовый редактор</li>
	<li>Транслятор (компилятор и/или интерпретатор)</li>
	<li>Средства автоматизированной сборки</li>
	<li>Отладчик</li>
</ul>

<p>Также IDE может включать в себя средства для интеграции с&nbsp;системами управления версиями&nbsp;и разнообразные инструменты для упрощения конструирования&nbsp;графического интерфейса пользователя. И это ещё не всё. Как правило, каждая IDE предназначена для нескольких языков программирования. Для разработки на языке C# можно выделить следующие среды разработки:</p>

<ul>
	<li>
<em>Visual Studio</em>. Разработана компанией Microsoft (так же, как и язык C#), поэтому является основной для создания приложений на C#.</li>
	<li>
<em>Project Rider</em>. Это кроссплатформенная&nbsp;интегрированная среда разработки программного обеспечения&nbsp;для платформы .NET, разрабатываемая компанией&nbsp;JetBrains.</li>
	<li>
<em>Sharp Developer</em>. Свободная среда разработки для языка C#, альтернатива Visual Studio .NET.</li>
	<li>
<em>Eclipse</em>. Данная IDE предназначена в основном для разработки Java-приложений, но и на C# также можно создавать приложения.</li>
	<li>
<em>Visual Studio Code</em>. Редактор исходного кода, разработанный Microsoft для Windows, Linux и macOS. Позиционируется как «лёгкий» редактор кода для кроссплатформенной разработки веб- и облачных приложений.</li>
</ul>

<p>Создавать первое приложение на C# мы будем в интегрированной среде разработки Visual Studio. На официальном сайте доступны три версии продукта:</p>

<ul>
	<li>
<strong>Community</strong> – полнофункциональная, расширяемая и бесплатная версия интегрированной среды разработки для создания современных приложений Android, iOS и Windows, а также веб-приложений и облачных служб.</li>
	<li>
<strong>Professiona</strong>l – платная версия, содержащая профессиональные инструменты и службы для индивидуальных разработчиков или небольших команд.</li>
	<li>
<strong>Enterprise</strong> – платная версия, представляющая интегрированное комплексное решение для команд любого размера с высокими требованиями к качеству и масштабу.</li>
</ul>

<p>Для создания приложений на C# будем использовать бесплатную и полнофункциональную среду разработки - <a href=&quot;https://visualstudio.microsoft.com/ru/thank-you-downloading-visual-studio/?sku=Community&amp;amp;rel=16.&quot;>Visual Studio Community 2019</a>.</p>

<h2>Установка Visual Studio</h2>

<p>После загрузки необходимо запустить установщик. В открывшемся окне нам предложат выбрать те компоненты, которые мы хотим установить вместе с Visual Studio. Стоит отметить, что Visual Studio — очень функциональная среда разработки и позволяет разрабатывать приложения с помощью множества языков и платформ.</p>

<p>В нашем случае интересен прежде всего C# и .NET Core, поэтому в наборе рабочих нагрузок можно выбрать только пункт&nbsp;«Кроссплатформенная разработка .NET Core». Можно выбрать и больше опций или вообще все опции, однако стоит учитывать свободный размер на жёстком диске — чем больше опций будет выбрано, тем больше места на диске будет занято.</p>

<p><img src=&quot;https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9302/retina-c1a5f979b92f39df9b5dbb9e05655650.png&quot; style=&quot;height: 232px;width: 600px;&quot;></p>

<p>При инсталляции Visual Studio на ваш компьютер будут установлены все необходимые инструменты для разработки программ, в том числе фреймворк .NET Core. Установка успешна? Начинаем писать программу!</p>

<h2>Создание проекта в Visual Studio</h2>

<p>Откройте Visual Studio и на стартовом экране выберите пункт «Создание проекта».</p>

<p><img src=&quot;https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9303/retina-e9d6c18f34d7ca3938324236d56649f1.png&quot; style=&quot;height: 543px;width: 400px;&quot;></p>

<p>На следующем окне в качестве типа проекта нужно выбрать&nbsp;<em>Консольное приложение (.NET Core)</em>. Это значит, что мы будем создавать приложение командной строки на языке C#.</p>

<p><img src=&quot;https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9301/retina-46380f18366864ddf29b317b2193d831.png&quot; style=&quot;height: 239px;width: 600px;&quot;></p>

<p>В следующем окне зададим название проекта. Пусть будет <em>HelloWorld</em>. На этом этапе также можно указать папку, где будет располагаться проект. После этого нажмите кнопку «Создать».</p>

<p>Visual Studio создаст и откроет проект. Окно будет выглядеть так:</p>

<p><img src=&quot;https://lh3.googleusercontent.com/s1AxMhJm5TUiAg-kTkXoCBNLTjjKbRGB-hGrLGSF6j8oHkqyT-bMe6f4PT_P5AVkaCy3GBX7neDBxZZQeVGNlsHbY6ULR0YAzzFHueQ4UFCKWsXjfpMIy3BVU731RTN2ekLLI7w&quot;></p>

<p>В нашем редакторе в центре находится сгенерированный по умолчанию код C#. Впоследствии мы изменим его на свой. Слева находится обозреватель решений, в котором можно увидеть структуру нашего проекта. В данном случае в обозревателе сгенерирована структура по умолчанию. В узле&nbsp;«Зависимости»&nbsp;содержатся сборки, которые добавлены в проект по умолчанию — классы библиотеки .NET, которые будет использовать C#. Однако не всегда все сборки нужны. Лишнее содержимое отсюда потом можно удалить. Или, наоборот, добавить какую-нибудь нужную библиотеку — именно в этом узле она будет размещена.</p>

<h2>Hello world</h2>

<p>Под узлом «Зависимости» расположен непосредственно сам файл кода программы —&nbsp;Program.cs. Как раз он и открыт в центральном окне. Вначале разберёмся, что весь этот код собой представляет:</p>

<pre class=&quot;csharp&quot; style=&quot;font-family:monospace;&quot;>
<span style=&quot;color: #0600FF;font-weight: bold;&quot;>using</span> <span style=&quot;color: #008080;&quot;>System</span><span style=&quot;color: #008000;&quot;>;</span>
&nbsp;
<span style=&quot;color: #0600FF;font-weight: bold;&quot;>namespace</span> HelloWorld
<span style=&quot;color: #008000;&quot;>{</span>
    <span style=&quot;color: #6666cc;font-weight: bold;&quot;>class</span> Program
    <span style=&quot;color: #008000;&quot;>{</span>
        <span style=&quot;color: #0600FF;font-weight: bold;&quot;>static</span> <span style=&quot;color: #6666cc;font-weight: bold;&quot;>void</span> Main<span style=&quot;color: #008000;&quot;>(</span><span style=&quot;color: #6666cc;font-weight: bold;&quot;>string</span><span style=&quot;color: #008000;&quot;>[</span><span style=&quot;color: #008000;&quot;>]</span> args<span style=&quot;color: #008000;&quot;>)</span>
        <span style=&quot;color: #008000;&quot;>{</span>
            Console<span style=&quot;color: #008000;&quot;>.</span><span style=&quot;color: #0000FF;&quot;>WriteLine</span><span style=&quot;color: #008000;&quot;>(</span><span style=&quot;color: #666666;&quot;>&quot;Hello World!&quot;</span><span style=&quot;color: #008000;&quot;>)</span><span style=&quot;color: #008000;&quot;>;</span>
        <span style=&quot;color: #008000;&quot;>}</span>
    <span style=&quot;color: #008000;&quot;>}</span>
<span style=&quot;color: #008000;&quot;>}</span>
</pre>

<p>В начале файла мы видим директиву&nbsp;using, после которой идёт название подключаемого пространства имён.&nbsp;Пространства имён&nbsp;необходимы для организации классов в общие блоки. Например, в первой строке&nbsp;подключается пространство имён System, которое содержит фундаментальные и базовые классы платформы .NET.</p>

<p>C# имеет C-подобный синтаксис, и каждая строка завершается точкой с запятой, а каждый блок кода помещается в фигурные скобки. Далее начинается уже наше пространство имён HelloWorld, которое будет создавать отдельную сборку или исполняемую программу. Сначала идёт ключевое слово&nbsp;namespace, после которого следует название пространства имён. По умолчанию Visual Studio даёт ему название проекта. Далее внутри фигурных скобок идёт блок пространства имён.</p>

<p>Пространство имён может включать другие пространства или классы. В нашем случае по умолчанию сгенерирован один класс — Program. Классы объявляются похожим способом: сначала идёт ключевое слово&nbsp;class, а потом название класса, и далее блок самого класса в фигурных скобках.</p>

<p>Класс может содержать различные переменные, методы, свойства, прочие инструкции. В данном случае объявлен один метод Main. В программе на C# метод Main является входной точкой программы, с него начинается всё управление. Это обязательный элемент любой программы.</p>

<p>Слово&nbsp;static&nbsp;указывает, что метод Main статический, а слово&nbsp;void&nbsp;— что он не возвращает никакого значения. Далее в скобках у нас идут параметры метода.&nbsp;string[] args&nbsp;— это массив с именем args, который хранит значения типа&nbsp;string, то есть строки. В данном случае они нам пока не нужны, но в реальной программе это те параметры, которые передаются при запуске программы из консоли.</p>

<p>Внутри метода располагаются действия, которые этот метод выполняет. По умолчанию он содержит одно действие:&nbsp;Console.WriteLine(&quot;Hello World!&quot;);&nbsp;- выводит в консоль строку &quot;Hello World!&quot;.</p>

<p>Теперь мы можем запустить программу на выполнение с помощью клавиши F5 или с панели инструментов, нажав на зелёную стрелку. И если вы все сделали правильно, то при запуске приложения увидите заветную строку.</p>

<p><img src=&quot;https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9304/retina-272e55ae74b3f3127c2c43a50dcac45f.png&quot; style=&quot;width: 800px;height: 379px;&quot;></p>

<h2>Интерактивное приложение на C#</h2>

<p>Теперь сделаем всё поинтересней —&nbsp;изменим код на следующий:</p>

<pre class=&quot;csharp&quot; style=&quot;font-family:monospace;&quot;>
<span style=&quot;color: #0600FF;font-weight: bold;&quot;>using</span> <span style=&quot;color: #008080;&quot;>System</span><span style=&quot;color: #008000;&quot;>;</span>
&nbsp;
<span style=&quot;color: #0600FF;font-weight: bold;&quot;>namespace</span> HelloWorld
<span style=&quot;color: #008000;&quot;>{</span>
    <span style=&quot;color: #6666cc;font-weight: bold;&quot;>class</span> Program
    <span style=&quot;color: #008000;&quot;>{</span>
        <span style=&quot;color: #0600FF;font-weight: bold;&quot;>static</span> <span style=&quot;color: #6666cc;font-weight: bold;&quot;>void</span> Main<span style=&quot;color: #008000;&quot;>(</span><span style=&quot;color: #6666cc;font-weight: bold;&quot;>string</span><span style=&quot;color: #008000;&quot;>[</span><span style=&quot;color: #008000;&quot;>]</span> args<span style=&quot;color: #008000;&quot;>)</span>
        <span style=&quot;color: #008000;&quot;>{</span>
            Console<span style=&quot;color: #008000;&quot;>.</span><span style=&quot;color: #0000FF;&quot;>Write</span><span style=&quot;color: #008000;&quot;>(</span><span style=&quot;color: #666666;&quot;>&quot;Введите свое имя: &quot;</span><span style=&quot;color: #008000;&quot;>)</span><span style=&quot;color: #008000;&quot;>;</span>
            <span style=&quot;color: #6666cc;font-weight: bold;&quot;>string</span> name <span style=&quot;color: #008000;&quot;>=</span> Console<span style=&quot;color: #008000;&quot;>.</span><span style=&quot;color: #0000FF;&quot;>ReadLine</span><span style=&quot;color: #008000;&quot;>(</span><span style=&quot;color: #008000;&quot;>)</span><span style=&quot;color: #008000;&quot;>;</span>
            Console<span style=&quot;color: #008000;&quot;>.</span><span style=&quot;color: #0000FF;&quot;>WriteLine</span><span style=&quot;color: #008000;&quot;>(</span>$<span style=&quot;color: #666666;&quot;>&quot;Привет {name}&quot;</span><span style=&quot;color: #008000;&quot;>)</span><span style=&quot;color: #008000;&quot;>;</span>   
        <span style=&quot;color: #008000;&quot;>}</span>
    <span style=&quot;color: #008000;&quot;>}</span>
<span style=&quot;color: #008000;&quot;>}</span></pre>

<p>По сравнению с автоматически сгенерированным кодом были внесены несколько изменений. Теперь в методе Main первой строкой выводится приглашение к вводу.</p>

<p>Класс Console, метод которого мы вызываем, находится в пространстве имён System. Это пространство подключено в начале с помощью директивы using. Без подключения пространства имён System невозможно было бы использовать класс Console.</p>

<p>Однако нам необязательно подключать пространство имён. Мы можем даже удалить первую строку, но в этом случае мы тогда должны будем указать полный путь до используемого класса:</p>

<pre class=&quot;csharp&quot; style=&quot;font-family:monospace;&quot;>
<span style=&quot;color: #000000;&quot;>System</span><span style=&quot;color: #008000;&quot;>.</span><span style=&quot;color: #0000FF;&quot;>Console</span><span style=&quot;color: #008000;&quot;>.</span><span style=&quot;color: #0000FF;&quot;>Write</span><span style=&quot;color: #008000;&quot;>(</span><span style=&quot;color: #666666;&quot;>&quot;Введите свое имя: &quot;</span><span style=&quot;color: #008000;&quot;>)</span><span style=&quot;color: #008000;&quot;>;</span></pre>

<p>Во второй строке определяется строковая переменная name (тип string), в которую пользователь вводит информацию с консоли:</p>

<pre class=&quot;csharp&quot; style=&quot;font-family:monospace;&quot;>
<span style=&quot;color: #6666cc;font-weight: bold;&quot;>string</span> name <span style=&quot;color: #008000;&quot;>=</span> Console<span style=&quot;color: #008000;&quot;>.</span><span style=&quot;color: #0000FF;&quot;>ReadLine</span><span style=&quot;color: #008000;&quot;>(</span><span style=&quot;color: #008000;&quot;>)</span><span style=&quot;color: #008000;&quot;>;</span></pre>

<p>Мы обозначили, что помощью метода <strong>ReadLine</strong>()&nbsp;можем считать с консоли строку.</p>

<p>Затем введённое имя выводится на консоль:</p>

<pre class=&quot;csharp&quot; style=&quot;font-family:monospace;&quot;>
Console<span style=&quot;color: #008000;&quot;>.</span><span style=&quot;color: #0000FF;&quot;>WriteLine</span><span style=&quot;color: #008000;&quot;>(</span>$<span style=&quot;color: #666666;&quot;>&quot;Привет {name}&quot;</span><span style=&quot;color: #008000;&quot;>)</span><span style=&quot;color: #008000;&quot;>;</span> </pre>

<p>Чтобы задать вывод значения переменной name в выводимой на консоль строке, применяются фигурные скобки {}. При выводе строки на консоль выражение&nbsp;{name}&nbsp;будет заменяться на значение переменной name — введённое имя.</p>

<p>Знак доллара ($) обозначает, что внутри строки таким образом можно выводить значения переменных. Теперь протестируем проект, запустив его выполнение.</p>

<p><img src=&quot;https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9300/retina-91d1eaff3abb47683db4692676c5ff42.png&quot; style=&quot;width: 800px;height: 418px;&quot;></p>

<p>Поздравляю, мы создали первое приложение! Исполняемый файл вы можете найти на жёстком диске в папке проекта в каталоге&nbsp;bin/Debug. Оно будет называться так же, как проект, и иметь расширение .exe. Этот файл можно запускать без Visual Studio, а также переносить для доработки на другие компьютеры, где есть .NET Core.</p>
"><h2><img alt="" src="https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9307/retina-6cb04c286fbecfdd2924cfb1765389ec.png"></h2>

<h2>IDE</h2>

<p>Что же нам нужно для создания первого приложения? Во-первых, нужен текстовый редактор, в котором мы будем писать исходный код. Во-вторых, нам понадобится компилятор, который преобразует исходный код в исполняемый файл (например, .exe-файл в операционной системе Windows). В-третьих, нужен фреймворк .NET, который необходим для компиляции и запуска приложения —&nbsp;о фреймворке .NET мы говорили в <a href="https://geekbrains.ru/posts/yazyk-programmirovaniya-c-sharp-istoriya-specifika-mesto-na-rynke?from=post">предыдущей статье</a>.</p>

<p>Все элементы, необходимые для создания первого приложения, объединены в специальной программе IDE (англ. Integrated Development Environment), а именно:</p>

<ul>
	<li>Кодовый редактор</li>
	<li>Транслятор (компилятор и/или интерпретатор)</li>
	<li>Средства автоматизированной сборки</li>
	<li>Отладчик</li>
</ul>

<p>Также IDE может включать в себя средства для интеграции с&nbsp;системами управления версиями&nbsp;и разнообразные инструменты для упрощения конструирования&nbsp;графического интерфейса пользователя. И это ещё не всё. Как правило, каждая IDE предназначена для нескольких языков программирования. Для разработки на языке C# можно выделить следующие среды разработки:</p>

<ul>
	<li>
<em>Visual Studio</em>. Разработана компанией Microsoft (так же, как и язык C#), поэтому является основной для создания приложений на C#.</li>
	<li>
<em>Project Rider</em>. Это кроссплатформенная&nbsp;интегрированная среда разработки программного обеспечения&nbsp;для платформы .NET, разрабатываемая компанией&nbsp;JetBrains.</li>
	<li>
<em>Sharp Developer</em>. Свободная среда разработки для языка C#, альтернатива Visual Studio .NET.</li>
	<li>
<em>Eclipse</em>. Данная IDE предназначена в основном для разработки Java-приложений, но и на C# также можно создавать приложения.</li>
	<li>
<em>Visual Studio Code</em>. Редактор исходного кода, разработанный Microsoft для Windows, Linux и macOS. Позиционируется как «лёгкий» редактор кода для кроссплатформенной разработки веб- и облачных приложений.</li>
</ul>

<p>Создавать первое приложение на C# мы будем в интегрированной среде разработки Visual Studio. На официальном сайте доступны три версии продукта:</p>

<ul>
	<li>
<strong>Community</strong> – полнофункциональная, расширяемая и бесплатная версия интегрированной среды разработки для создания современных приложений Android, iOS и Windows, а также веб-приложений и облачных служб.</li>
	<li>
<strong>Professiona</strong>l – платная версия, содержащая профессиональные инструменты и службы для индивидуальных разработчиков или небольших команд.</li>
	<li>
<strong>Enterprise</strong> – платная версия, представляющая интегрированное комплексное решение для команд любого размера с высокими требованиями к качеству и масштабу.</li>
</ul>

<p>Для создания приложений на C# будем использовать бесплатную и полнофункциональную среду разработки - <a href="https://visualstudio.microsoft.com/ru/thank-you-downloading-visual-studio/?sku=Community&amp;rel=16.">Visual Studio Community 2019</a>.</p>

<h2>Установка Visual Studio</h2>

<p>После загрузки необходимо запустить установщик. В открывшемся окне нам предложат выбрать те компоненты, которые мы хотим установить вместе с Visual Studio. Стоит отметить, что Visual Studio — очень функциональная среда разработки и позволяет разрабатывать приложения с помощью множества языков и платформ.</p>

<p>В нашем случае интересен прежде всего C# и .NET Core, поэтому в наборе рабочих нагрузок можно выбрать только пункт&nbsp;«Кроссплатформенная разработка .NET Core». Можно выбрать и больше опций или вообще все опции, однако стоит учитывать свободный размер на жёстком диске — чем больше опций будет выбрано, тем больше места на диске будет занято.</p>

<p><img src="https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9302/retina-c1a5f979b92f39df9b5dbb9e05655650.png" style="height: 232px;width: 600px;"></p>

<p>При инсталляции Visual Studio на ваш компьютер будут установлены все необходимые инструменты для разработки программ, в том числе фреймворк .NET Core. Установка успешна? Начинаем писать программу!</p>

<h2>Создание проекта в Visual Studio</h2>

<p>Откройте Visual Studio и на стартовом экране выберите пункт «Создание проекта».</p>

<p><img src="https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9303/retina-e9d6c18f34d7ca3938324236d56649f1.png" style="height: 543px;width: 400px;"></p>

<p>На следующем окне в качестве типа проекта нужно выбрать&nbsp;<em>Консольное приложение (.NET Core)</em>. Это значит, что мы будем создавать приложение командной строки на языке C#.</p>

<p><img src="https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9301/retina-46380f18366864ddf29b317b2193d831.png" style="height: 239px;width: 600px;"></p>

<p>В следующем окне зададим название проекта. Пусть будет <em>HelloWorld</em>. На этом этапе также можно указать папку, где будет располагаться проект. После этого нажмите кнопку «Создать».</p>

<p>Visual Studio создаст и откроет проект. Окно будет выглядеть так:</p>

<p><img src="https://lh3.googleusercontent.com/s1AxMhJm5TUiAg-kTkXoCBNLTjjKbRGB-hGrLGSF6j8oHkqyT-bMe6f4PT_P5AVkaCy3GBX7neDBxZZQeVGNlsHbY6ULR0YAzzFHueQ4UFCKWsXjfpMIy3BVU731RTN2ekLLI7w"></p>

<p>В нашем редакторе в центре находится сгенерированный по умолчанию код C#. Впоследствии мы изменим его на свой. Слева находится обозреватель решений, в котором можно увидеть структуру нашего проекта. В данном случае в обозревателе сгенерирована структура по умолчанию. В узле&nbsp;«Зависимости»&nbsp;содержатся сборки, которые добавлены в проект по умолчанию — классы библиотеки .NET, которые будет использовать C#. Однако не всегда все сборки нужны. Лишнее содержимое отсюда потом можно удалить. Или, наоборот, добавить какую-нибудь нужную библиотеку — именно в этом узле она будет размещена.</p>

<h2>Hello world</h2>

<p>Под узлом «Зависимости» расположен непосредственно сам файл кода программы —&nbsp;Program.cs. Как раз он и открыт в центральном окне. Вначале разберёмся, что весь этот код собой представляет:</p>

<pre class="csharp" style="font-family:monospace;"><span style="color: #0600FF;font-weight: bold;">using</span> <span style="color: #008080;">System</span><span style="color: #008000;">;</span>
&nbsp;
<span style="color: #0600FF;font-weight: bold;">namespace</span> HelloWorld
<span style="color: #008000;">{</span>
    <span style="color: #6666cc;font-weight: bold;">class</span> Program
    <span style="color: #008000;">{</span>
        <span style="color: #0600FF;font-weight: bold;">static</span> <span style="color: #6666cc;font-weight: bold;">void</span> Main<span style="color: #008000;">(</span><span style="color: #6666cc;font-weight: bold;">string</span><span style="color: #008000;">[</span><span style="color: #008000;">]</span> args<span style="color: #008000;">)</span>
        <span style="color: #008000;">{</span>
            Console<span style="color: #008000;">.</span><span style="color: #0000FF;">WriteLine</span><span style="color: #008000;">(</span><span style="color: #666666;">"Hello World!"</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span>
        <span style="color: #008000;">}</span>
    <span style="color: #008000;">}</span>
<span style="color: #008000;">}</span>
</pre>

<p>В начале файла мы видим директиву&nbsp;using, после которой идёт название подключаемого пространства имён.&nbsp;Пространства имён&nbsp;необходимы для организации классов в общие блоки. Например, в первой строке&nbsp;подключается пространство имён System, которое содержит фундаментальные и базовые классы платформы .NET.</p>

<p>C# имеет C-подобный синтаксис, и каждая строка завершается точкой с запятой, а каждый блок кода помещается в фигурные скобки. Далее начинается уже наше пространство имён HelloWorld, которое будет создавать отдельную сборку или исполняемую программу. Сначала идёт ключевое слово&nbsp;namespace, после которого следует название пространства имён. По умолчанию Visual Studio даёт ему название проекта. Далее внутри фигурных скобок идёт блок пространства имён.</p>

<p>Пространство имён может включать другие пространства или классы. В нашем случае по умолчанию сгенерирован один класс — Program. Классы объявляются похожим способом: сначала идёт ключевое слово&nbsp;class, а потом название класса, и далее блок самого класса в фигурных скобках.</p>

<p>Класс может содержать различные переменные, методы, свойства, прочие инструкции. В данном случае объявлен один метод Main. В программе на C# метод Main является входной точкой программы, с него начинается всё управление. Это обязательный элемент любой программы.</p>

<p>Слово&nbsp;static&nbsp;указывает, что метод Main статический, а слово&nbsp;void&nbsp;— что он не возвращает никакого значения. Далее в скобках у нас идут параметры метода.&nbsp;string[] args&nbsp;— это массив с именем args, который хранит значения типа&nbsp;string, то есть строки. В данном случае они нам пока не нужны, но в реальной программе это те параметры, которые передаются при запуске программы из консоли.</p>

<p>Внутри метода располагаются действия, которые этот метод выполняет. По умолчанию он содержит одно действие:&nbsp;Console.WriteLine("Hello World!");&nbsp;- выводит в консоль строку "Hello World!".</p>

<p>Теперь мы можем запустить программу на выполнение с помощью клавиши F5 или с панели инструментов, нажав на зелёную стрелку. И если вы все сделали правильно, то при запуске приложения увидите заветную строку.</p>

<p><img src="https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9304/retina-272e55ae74b3f3127c2c43a50dcac45f.png" style="width: 800px;height: 379px;"></p>

<h2>Интерактивное приложение на C#</h2>

<p>Теперь сделаем всё поинтересней —&nbsp;изменим код на следующий:</p>

<pre class="csharp" style="font-family:monospace;"><span style="color: #0600FF;font-weight: bold;">using</span> <span style="color: #008080;">System</span><span style="color: #008000;">;</span>
&nbsp;
<span style="color: #0600FF;font-weight: bold;">namespace</span> HelloWorld
<span style="color: #008000;">{</span>
    <span style="color: #6666cc;font-weight: bold;">class</span> Program
    <span style="color: #008000;">{</span>
        <span style="color: #0600FF;font-weight: bold;">static</span> <span style="color: #6666cc;font-weight: bold;">void</span> Main<span style="color: #008000;">(</span><span style="color: #6666cc;font-weight: bold;">string</span><span style="color: #008000;">[</span><span style="color: #008000;">]</span> args<span style="color: #008000;">)</span>
        <span style="color: #008000;">{</span>
            Console<span style="color: #008000;">.</span><span style="color: #0000FF;">Write</span><span style="color: #008000;">(</span><span style="color: #666666;">"Введите свое имя: "</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span>
            <span style="color: #6666cc;font-weight: bold;">string</span> name <span style="color: #008000;">=</span> Console<span style="color: #008000;">.</span><span style="color: #0000FF;">ReadLine</span><span style="color: #008000;">(</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span>
            Console<span style="color: #008000;">.</span><span style="color: #0000FF;">WriteLine</span><span style="color: #008000;">(</span>$<span style="color: #666666;">"Привет {name}"</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span>   
        <span style="color: #008000;">}</span>
    <span style="color: #008000;">}</span>
<span style="color: #008000;">}</span></pre>

<p>По сравнению с автоматически сгенерированным кодом были внесены несколько изменений. Теперь в методе Main первой строкой выводится приглашение к вводу.</p>

<p>Класс Console, метод которого мы вызываем, находится в пространстве имён System. Это пространство подключено в начале с помощью директивы using. Без подключения пространства имён System невозможно было бы использовать класс Console.</p>

<p>Однако нам необязательно подключать пространство имён. Мы можем даже удалить первую строку, но в этом случае мы тогда должны будем указать полный путь до используемого класса:</p>

<pre class="csharp" style="font-family:monospace;"><span style="color: #000000;">System</span><span style="color: #008000;">.</span><span style="color: #0000FF;">Console</span><span style="color: #008000;">.</span><span style="color: #0000FF;">Write</span><span style="color: #008000;">(</span><span style="color: #666666;">"Введите свое имя: "</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span></pre>

<p>Во второй строке определяется строковая переменная name (тип string), в которую пользователь вводит информацию с консоли:</p>

<pre class="csharp" style="font-family:monospace;"><span style="color: #6666cc;font-weight: bold;">string</span> name <span style="color: #008000;">=</span> Console<span style="color: #008000;">.</span><span style="color: #0000FF;">ReadLine</span><span style="color: #008000;">(</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span></pre>

<p>Мы обозначили, что помощью метода <strong>ReadLine</strong>()&nbsp;можем считать с консоли строку.</p>

<p>Затем введённое имя выводится на консоль:</p>

<pre class="csharp" style="font-family:monospace;">Console<span style="color: #008000;">.</span><span style="color: #0000FF;">WriteLine</span><span style="color: #008000;">(</span>$<span style="color: #666666;">"Привет {name}"</span><span style="color: #008000;">)</span><span style="color: #008000;">;</span> </pre>

<p>Чтобы задать вывод значения переменной name в выводимой на консоль строке, применяются фигурные скобки {}. При выводе строки на консоль выражение&nbsp;{name}&nbsp;будет заменяться на значение переменной name — введённое имя.</p>

<p>Знак доллара ($) обозначает, что внутри строки таким образом можно выводить значения переменных. Теперь протестируем проект, запустив его выполнение.</p>

<p><img src="https://d2xzmw6cctk25h.cloudfront.net/geekbrains/public/ckeditor_assets/pictures/9300/retina-91d1eaff3abb47683db4692676c5ff42.png" style="width: 800px;height: 418px;"></p>

<p>Поздравляю, мы создали первое приложение! Исполняемый файл вы можете найти на жёстком диске в папке проекта в каталоге&nbsp;bin/Debug. Оно будет называться так же, как проект, и иметь расширение .exe. Этот файл можно запускать без Visual Studio, а также переносить для доработки на другие компьютеры, где есть .NET Core.</p>
</div>