<?php
require_once(__DIR__ . '/_template.php');
class GalleryEntry
{
	public string $srcFull;
	public string $srcSmall;
	public string $description;
	public string $aspectRatio;

	public function __construct(
		$aspectRatio,
		$src,
		$srcSmall,
		$description
	)
	{
		$this->srcFull = $src;
		$this->description = $description;
		$this->srcSmall = $srcSmall;
		$this->aspectRatio = $aspectRatio;
		// $this->width = $w;
		// $this->height = $h;
	}
}

$entries = [
	new GalleryEntry("64/48", "/images/karlovo/IMG_1423.png", "/images/karlovo/IMG_1423-small.png", "Кооперация: европрограма 1"),
	new GalleryEntry("64/48", "/images/karlovo/IMG_1405.png", "/images/karlovo/IMG_1405-small.png", "Кооперация: европрограма 2"),
	new GalleryEntry("64/48", "/images/karlovo/IMG_1392.png", "/images/karlovo/IMG_1392-small.png", "Кооперация: европрограма 3"),
	new GalleryEntry("64/48", "/images/karlovo/IMG_1403.png", "/images/karlovo/IMG_1403-small.png", "Индивидуално саниран апартамент"),
	new GalleryEntry("64/48", "/images/karlovo/IMG_1404.png", "/images/karlovo/IMG_1404-small.png", "Кооперация: европрограма 4"),
	new GalleryEntry("64/48", "/images/karlovo/IMG_1420.png", "/images/karlovo/IMG_1420-small.png", "Работа от въже"),
	new GalleryEntry("64/48", "/images/karlovo/IMG_1389.png", "/images/karlovo/IMG_1389-small.png", "Работа от скеле"),
	new GalleryEntry("64/48", "/images/house-wip/IMG_1298.png", "/images/house-wip/IMG_1298-small.png", "Вила: фасада заден двор"),
	new GalleryEntry("64/48", "/images/house-wip/IMG_1301.png", "/images/house-wip/IMG_1301-small.png", "Вила: предна фасада"),
	new GalleryEntry("64/48", "/images/house-wip/IMG_1308.png", "/images/house-wip/IMG_1308-small.png", "Вила: преди мазилка"),
	new GalleryEntry("64/48", "/images/house-wip/IMG_1303.png", "/images/house-wip/IMG_1303-small.png", "Вила: първоначална мазилка"),
	new GalleryEntry("64/48", "/images/house-wip/IMG_1310.png", "/images/house-wip/IMG_1310-small.png", "Вила: завършен проект"),
];


render_page(Page::$gallery, function () use ($entries) {
	?>

	<section>
		<h1>Галерия - Саниране по европрограми</h1>
		<p>Добре дошли в галерията със снимки на Христофоров Билд! Тук можете да видите някои от последните ни проекти - кооперации, санирани по европрограми и вили. Нашият екип от опитни професионалисти предоставя висококачествени услуги години и се
			гордеем със способността си да вдъхнем живот на визията на нашите клиенти.
			В тази галерия ще видите различни проекти, които сме изпълнили, включително жилищни домове, търговски сгради и
			реконструкции.
		</p>
		<p>Разбираме, че всеки проект е уникален и работим в тясно сътрудничество с нашите клиенти, за да
			гарантираме, че техните специфични нужди са удовлетворени. Ние използваме най-новите технологии и техники, за да
			гарантираме, че нашите проекти са завършени ефективно и според най-високите стандарти. Докато разглеждате
			галерията, ще видите вниманието към детайла, което влагаме във всяко едно саниране.
		</p>
		<p>
			Благодарим ви, че обмисляте Христофоров Билд за преобразяването на вашия дом!. За нас ще бъде чест да имаме
			възможността да работим с вас и да вдъхнем живот на вашата визия. Моля, не се колебайте
			<a href="/contact">да се свържете с нас</a>, ако имате въпроси или желаете да насрочите консултация.
		</p>
	</section>

	<section>

		<div class="posts">
			<?php

			foreach ($entries as $entry) {
				?>
				<article>
					<a href="<?php echo $entry->srcFull; ?>" class="image ">
						<img src="<?php echo $entry->srcSmall ?>" alt="<?php echo $entry->description ?>" loading="lazy"
							style="aspect-ratio: <?php echo $entry->aspectRatio; ?>;" /></a>
					<h3>
						<?php echo $entry->description ?>
					</h3>
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