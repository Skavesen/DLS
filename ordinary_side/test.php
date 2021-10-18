<div class="container">
	<form method="get" id="main-form" <?php if ($_GET['dologin']) {
											echo 'style="display:none !important;"';
										} ?>>
		<div class="questions-wrap">
			<?php
			$questions_groups = array(
				'Раздел 1' => array(
					array(
						'Что такое ООП?',
						'single',
						array(
							array('Объектно-ориентированное программирование — методология программирования, основанная на представлении программы в виде совокупности объектов, каждый из которых является экземпляром определенного класса, а классы образуют иерархию наследования.', true),
							array('Объектно-ориентированное программирование — так называют любой тип программирования, в котором используются понятия высокого уровня и, в отличие от Assembler, в котором не работают напрямую с ячейками памяти ПК.'),
							array('Объектно-ориентированное программирование — просто красивое понятие. Если вдуматься, оно не несет дополнительной смысловой нагрузки, просто программисты любят аббревиатуры, так области их знаний выглядят сложнее.'),
							array('Очень одинокий программист.'),
						)
					),
					array(
						'Что такое класс в Java?',
						'single',
						array(
							array('Уровень сложности программы. Все операторы делятся на классы в зависимости от сложности их использования.'),
							array('Базовый элемент объектно-ориентированного программирования в языке Java.', true),
							array('Просто одно из возможных названий переменной.'),
							array('Такое понятие есть только в C++, в Java такого понятия нет.'),
						)
					),
					array(
						'Как объявить класс в коде?',
						'single',
						array(
							array('class MyClass {}', true),
							array('new class MyClass {}'),
							array('select * from class MyClass {}'),
							array('MyClass extends class {}'),
						)
					),

					array(
						'Для чего используется оператор NEW?',
						'single',
						array(
							array('Для создания новой переменной.'),
							array('Для объявления нового класса.'),
							array('Для создания экземпляра класса.', true),
							array('Это антагонист оператора OLD.'),
						)
					),

					array(
						'Что означает ключевое слово extends?',
						'single',
						array(
							array('Что данный класс наследуется от другого.', true),
							array('Что это дополнительный модуль класса, который расширяет его свойства.'),
							array('Что два класса делают одно и то же.'),
							array('Что это самый большой класс в программе.'),
						)
					),

					array(
						'Что означает перегрузка метода в Java (overload).',
						'single',
						array(
							array('Изменение поведения метода класса относительно родительского.'),
							array('Изменение поведения метода класса относительно дочернего.'),
							array('Несколько методов с одинаковым названием, но разным набором параметров.', true),
							array('Несколько разных классов с одинаковым методом.'),
						)
					),

					array(
						'Что означает переопределение метода в Java (override).',
						'single',
						array(
							array('Изменение поведения метода класса относительно родительского.', true),
							array('Изменение поведения метода класса относительно дочернего.'),
							array('Несколько методов с одинаковым названием, но разным набором параметров.'),
							array('Несколько разных классов с одинаковым методом.'),
						)
					),

					array(
						'Чем отличаются static-метод класса от обычного метода класса?',
						'single',
						array(
							array('Обычный метод класса можно перегрузить, а static-метод нельзя.'),
							array('Обычный метод класса можно переопределить, а static-метод нельзя.'),
							array('Обычный метод класса работает от объекта класса, а static-метод от всего класса.', true),
							array('Static-метод класса можно вызывать только внутри класса, а обычный - в любой части кода.'),
						)
					),

					array(
						'Как вызвать static-метод внутри обычного?',
						'single',
						array(
							array('Никак, static-метод можно вызвать только от объекта класса.'),
							array('Можно, надо перед этим перегрузить обычный метод класса.'),
							array('Можно, надо перед этим переопределить обычный метод класса.'),
							array('Можно, ничего дополнительно делать не надо.', true),
						)
					),

					array(
						'Как вызвать обычный метод класса внутри static-метода?',
						'single',
						array(
							array('Никак, static-метод не работает с объектом класса.', true),
							array('Можно, надо перед этим перегрузить обычный метод класса.'),
							array('Можно, надо перед этим переопределить обычный метод класса.'),
							array('Можно, ничего дополнительно делать не надо.'),
						)
					),
				)
			);

			$end_to_end_numbering = 0; //cмещение нумерации вопросов на количество в предыдущих группах
			$question_group_number = 0;

			foreach ($questions_groups as $questions_group_key => &$questions_group) {
				echo '<div class="questions-group">';
				echo '<h2 class="questions-group-title">' . $questions_group_key . '</h3>';

				foreach ($questions_group as $question_number => &$question) {

					echo '<div class="question ' . ($question[1] === 'single' ? 'question-single' : 'question-multiple') . '">';
					echo '<h3 class="question-title">' . (($question_group_number === 0 ? $question_number : ($question_number + $end_to_end_numbering))) . ') ' . $question[0] . '</h3>';

					//случайный порядок ответа мы задаём чисто визуально с помощью css класса со свойством order=n(например: answer-label--n)
					foreach ($question[2] as $answer_number => &$answer) {
						echo '<label class="answer-label answer-label--' . random_int(1, 10) . '"><input type=' . ($question[1] === 'single' ? 'radio' : 'checkbox') . ' name="question-' . ($question_group_number === 0 ? $question_number : ($question_number + $end_to_end_numbering)) . '[]" value="' . $answer_number . '"><span>' . $answer[0] . '</span></label>';
					}
					echo '</div>';
				}
				echo '</div>';
				++$question_group_number;
				$end_to_end_numbering += count($questions_group);
			}
			?>

		</div>
		<button class="submit-form-btn" name="dologin" type="submit">Завершить тест</button>
	</form>

	<div class="results">
		<?php
		if ($_GET['dologin']) {
			echo '<button class="submit-form-btn" onclick="location.href = location.origin + location.pathname ">Пройти тест заново</button>';

			echo '<div class="visible-timer-wrap"><div class="visible-timer-label">Продолжительность прохождения теста:</div><div class="visible-timer">' . ($_GET['hidden-timer']) . '</div></div>';
			echo '<div class="visible-timer-wrap"><div class="visible-timer-label">Момент завершения теста:</div><div class="visible-timer">' . (date("H:i:s m.d.y")) . '</div></div>';
			echo '<h2 class="results-title" >Результат прохождения теста:</h2>';

			echo '<div>';
			$end_to_end_numbering = 0; //cмещение нумерации вопросов на количество в предыдущих группах
			$question_group_number = 0;
			$questions_counter = 0;
			foreach ($questions_groups as $questions_group_key => $questions_group) {
				echo '<div class="questions-group">';
				echo '<h2 class="questions-group-title">' . $questions_group_key . '</h3>';

				foreach ($questions_group as $question_number => $question) {
					++$questions_counter;
					echo '<div class="question question-result">';

					echo 'Вопрос по пдд ' . (($question_group_number === 0 ? $question_number : ($question_number + $end_to_end_numbering))) . ': ';

					if (isset($_GET['question-' . ($question_group_number === 0 ? $question_number : ($question_number + $end_to_end_numbering))])) {
						if ($question[1] === 'single') {
							unset($checked_answer_number);
							$checked_answer_number = (int)($_GET['question-' . ($question_group_number === 0 ? $question_number : ($question_number + $end_to_end_numbering))][0]);

							if (isset($question[2][$checked_answer_number]) && isset($question[2][$checked_answer_number][1]) && $question[2][$checked_answer_number][1]) {
								echo " Верно";
							} else {
								echo " Неверно";
							}
						} else {
							$checked_answers_numbers = ($_GET['question-' . ($question_group_number === 0 ? $question_number : ($question_number + $end_to_end_numbering))]);
							$multiTest = true;
							foreach ($question[2] as $answer_number => $answer) {
								$multiTestPart = true; //валидность конкретного значения. Для вопросов с несколькими вариантами выбора нужно не только чтобы были выбравны все верные, но и чтобы не было выбрано ни одного неверного варианта ответа
								/////////////////////////////////////////////////////

								if (isset($answer[1]) && $answer[1]) { //ответ является верным
									if (in_array((string)$answer_number, $checked_answers_numbers)) { //отмечен ли данный ответ

									} else {
										$multiTestPart = false;
									}
								} else {
									if (in_array((string)$answer_number, $checked_answers_numbers)) { //отмечен ли данный ответ
										$multiTestPart = false;
									} else {
									}
								}
								if ($multiTestPart) {
									$multiTest = true;
								} else {
									$multiTest = false;
									break;
								}
							}
							if ($multiTest) {
								echo " Верно";
							} else {
								echo " Неверно";
							}
						}
					} else {
						if ($question[1] === 'single') {
							echo " Вариант ответа не выбран";
						} else {

							echo " Ни один вариант ответа не выбран";
						}
					}
					echo '</div>';
				}
				echo '</div>';
				++$question_group_number;
				$end_to_end_numbering += count($questions_group);
			}
			echo '</div>';

			echo '<br>--------------------------------------------------<br>';
		}
		?>
	</div>
</div>

<style>
	a,
	abbr,
	acronym,
	address,
	applet,
	article,
	aside,
	audio,
	b,
	big,
	blockquote,
	body,
	canvas,
	caption,
	center,
	cite,
	code,
	dd,
	del,
	details,
	dfn,
	div,
	dl,
	dt,
	em,
	embed,
	fieldset,
	figcaption,
	figure,
	footer,
	form,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	header,
	hgroup,
	html,
	i,
	iframe,
	img,
	ins,
	kbd,
	label,
	legend,
	li,
	mark,
	menu,
	nav,
	object,
	ol,
	output,
	p,
	pre,
	q,
	ruby,
	s,
	samp,
	section,
	small,
	span,
	strike,
	strong,
	sub,
	summary,
	sup,
	table,
	tbody,
	td,
	tfoot,
	th,
	thead,
	time,
	tr,
	tt,
	u,
	ul,
	var,
	video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline
	}

	article,
	aside,
	details,
	figcaption,
	figure,
	footer,
	header,
	hgroup,
	menu,
	nav,
	section {
		display: block
	}

	body {
		line-height: 1;
		font-family: Roboto, sans-serif
	}

	ol,
	ul {
		list-style: none
	}

	blockquote,
	q {
		quotes: none
	}

	blockquote:after,
	blockquote:before,
	q:after,
	q:before {
		content: '';
		content: none
	}

	table {
		border-collapse: collapse;
		border-spacing: 0
	}

	.green {
		background-color: green
	}

	.red {
		background-color: red
	}

	h1 {
		font-size: 30px;
		font-weight: 700
	}

	h2 {
		font-size: 25px;
		font-weight: 700
	}

	h3 {
		font-size: 20px;
		font-weight: 700
	}

	.task-wrap {
		margin-top: 30px
	}

	.task-wrap p {
		font-size: 18px
	}

	.task-wrap p+p {
		margin-top: 15px
	}

	.container {
		max-width: 95%;
		width: 1280px;
		margin: 0 auto
	}

	.questions-wrap {
		margin-top: 30px
	}

	.questions-group {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between
	}

	.questions-group:not(:last-child) {
		margin-bottom: 10px
	}

	.question {
		display: block;
		width: calc(50% - 15px);
		margin-bottom: 20px
	}

	.question:nth-child(2n) {
		margin-right: 29px
	}

	.questions-group-title {
		margin-bottom: 15px;
		display: block;
		width: 100%
	}

	.question-title {
		margin-bottom: 10px;
		display: block;
		width: 100%
	}

	#hidden-timer {
		display: none
	}

	.visible-timer-wrap {
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		margin-top: 20px
	}

	.visible-timer-label {
		font-weight: 800;
		font-size: 30px;
		margin-right: 30px
	}

	.visible-timer {
		color: #00f;
		font-weight: 800;
		font-size: 50px
	}

	.results-title {
		text-align: center;
		margin-top: 30px;
		margin-bottom: 20px
	}

	.submit-form-btn {
		cursor: pointer;
		-webkit-appearance: none;
		appearance: none;
		border: 2px solid red;
		font-size: 50px;
		color: red;
		background: #fff;
		border-radius: 10px;
		padding: 20px 20px 30px;
		font-weight: 900;
		margin: 15px auto 0;
		display: flex;
		justify-content: center;
		align-items: center;
		line-height: 1;
		transition-duration: .2s
	}

	.submit-form-btn:hover {
		color: #fff;
		background: red
	}

	.answer-label {
		display: block;
		cursor: pointer
	}

	.question {
		display: flex;
		flex-direction: column;
	}

	.question-title {
		order: 0;
	}

	.answer-label--1 {
		order: 1;
	}

	.answer-label--2 {
		order: 2;
	}

	.answer-label--3 {
		order: 3;
	}

	.answer-label--4 {
		order: 4;
	}

	.answer-label--5 {
		order: 5;
	}

	.answer-label--6 {
		order: 6;
	}

	.answer-label--7 {
		order: 7;
	}

	.answer-label--8 {
		order: 8;
	}

	.answer-label--9 {
		order: 9;
	}

	.answer-label--10 {
		order: 10;
	}
</style>