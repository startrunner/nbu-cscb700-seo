<?php
require_once(__DIR__ . '/_template.php');

class FAQEntry
{
	public string $imageAspectRatio;
	public string $imageSrc;
	public string $imageDescription;
	public string $question;
	public string $answer;

	public function __construct($imageAspectRatio, $imageSrc, $imageDescription, $question, $answer)
	{
		$this->imageAspectRatio = $imageAspectRatio;
		$this->imageSrc = $imageSrc;
		$this->question = $question;
		$this->answer = $answer;
		$this->imageDescription = $imageDescription;
	}
}

$faqEntries = [
	new FAQEntry(
		'56/37',
		'/images/faq/decision.png',
		'Илюстрация: Вземане на решение',
		"Кой е най-добрия тип топлоизолация за моето жилище?",
		"Най-добрият тип саниране зависи от конкретиката на жилището, климата, архитектурата и бюджета на клиента.
		По нашите географски ширини това обикновено е външната топлоизолация."
	),
	new FAQEntry(
		'56/37',
		'/images/faq/years.png',
		'Илюстрация: Издръжливост през годините',
		"Колко време издържа поставена топлоизолация?",
		"Животът на санирането може да варира от няколко години до десетилетия, в зависимост от материала и качеството на изпълнението. 
		  Ние от " . COMPANY_NAME_FULL . " държим на качеството винаги работим с най-добрите материали на пазара."
	),
	new FAQEntry(
		'56/37',
		'/images/faq/materials.png',
		'Илюстрация: Строителни материали',
		"Кой е най-добрият материал за саниране?",
		"Обикновено това е стиропор или фибран в зависимост от повърхността на стената, климата и архитектурата на жилището.
		При ново строителство се използва и стъклена вата, която е допълнително защитена от пожари."
	),
	new FAQEntry(
		'56/37',
		'/images/faq/cash.png',
		'Илюстрация: Пари в брой',
		"Колко ще ми струва санирането?",
		"Цената зависи от използвания материал, площта на санираната стена, както и спецификата на жилището.
		Свържете се с нас, за да получите оферта."
	),
	new FAQEntry(
		'56/37',
		'/images/faq/time.png',
		'Илюстрация: Време',
		"Колко време отнема санирането на едно жилище?",
		"Времето за работа варира доста, като най-важни фактори са квадратурата и геометрията на вашата фасада.
		Средностатистическото време за саниране на апартамент на панелен блок е две работни седмици."
	),
	new FAQEntry(
		'56/37',
		'/images/faq/phone-call.png',
		'Илюстрация: Телефонен разговор',
		"Мога ли да получа оферта?",
		"Разбира се! Свържете се с нас, за да запазите час за оглед на жилището и да получите корпоративна оферта."
	),
];



render_page(Page::$home, function () use ($faqEntries) {
	?>

	<!-- Banner -->
	<section id="banner">
		<div class="content">
			<header>
				<h1>Начало - Христофоров Билд</h1>
				<h2>Топлоизолации и фугиране</h2>
			</header>
			<p>Христофоров Билд 2035 ЕООД предлага височинно-ремонтни дейности, като основно специализира в топлоизолации и
				фугиране от скеле и въже.
				Нашият дългогодишен опит в тези ремонтни дейности ви гарантира безупречно качество на разумна цена.</p>
			<!-- <ul class="actions">
																													<li><a href="#" class="button big">Learn More</a></li>
																												</ul> -->
		</div>
		<span class="image object">
			<img src="images/orange-building-small.png" alt="Снимка: Оранжева санирана сграда" width="64" height="48" />
		</span>
	</section>

	<!-- Section -->
	<section>
		<header class="major">
			<h2>Защо топлоизолация?</h2>
		</header>
		<div class="features">
			<article>
				<span class="icon fa-gem"></span>
				<div class="content">
					<h3>Какви са ползите от топлоизолацията?</h3>
					<p>
					<ol>
						<li><strong>Намаляване на разходите за отопление</strong>: Топлоизолацията помага да се запазят
							топлината в
							помещението, което намаля разходите за отопление</li>
						<li><strong>Повишаване на комфорта</strong>: Поддържането на постоянна температура в помещението
							повишава комфорта
							на живеещите там.</li>
						<li><strong>Защита на околната среда</strong>: Намаленият енергиен разход помага за опазването на
							околната среда
						</li>
					</ol>
					</p>
				</div>
			</article>
			<article>
				<span class="icon solid fa-paper-plane"></span>
				<div class="content">
					<h3>За какви жилища е подходящо санирането?</h3>
					<p>Топлоизолациите, още познати под термина саниране, са подходящи за всякакви жилища, като къщи,
						апартаменти и други жилищни и комерсиални сгради.
						<br />Те са особено полезни за стари и недостатъчно изолирани панелни жилища, където е необходимо да
						се подобрят енергоефективността и комфорта.
						<br />Служат и като допълнителна защита за новопостроени или реновирани жилища, за спестяване на
						енергия и намаляне на разходите за отопление.
						<br />
					</p>
				</div>
			</article>
		</div>
	</section>

	<!-- Section -->
	<section>
		<header class="major">
			<h2>Често задавани въпроси</h2>
		</header>
		<div class="posts">
			<?php
			foreach ($faqEntries as $entry) {
				?>

				<article>
					<div class="image">
						<img loading="lazy" src="<?php echo $entry->imageSrc ?>"
							style="aspect-ratio: <?php echo $entry->imageAspectRatio; ?>;"
							alt="<?php echo $entry->imageDescription ?>" />
					</div>
					<h3>
						<?php echo $entry->question; ?>
					</h3>
					<p><?php echo $entry->answer; ?></p>
				</article>

				<?php
			}
			?>
		</div>
	</section>

	<?php
});

die();
?>