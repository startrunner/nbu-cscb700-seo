<?php
const SITE_TITLE = "Христофоров";
const CONTACT_EMAIL = "offers@hristoforov.bg";
const CONTACT_ADDRESS = "София, бул. Симеоновско шосе №10";
const CONTACT_PHONE = "+359 82465491";
const COMPANY_NAME_FULL = 'Христофоров Билд 2035';
const COMPANY_NAME_Legal = 'Христофоров Билд 2035 ЕООД';
const COMPANY_NAME_Short = 'Христофоров';
const CONTACT_WORKING_HOURS = 'Работно време: Понеделник - Петък 10:00 - 19:00';

function get_base_url(){
    $url = '';
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];
    return $url;
}

class Page
{
    public static Page $home;
    public static Page $gallery;
    public static Page $about;
    public static Page $privacyPolicy;
    public static Page $contact;

    public string $href;
    public string $title;
    public ?string $pageDescription;
    public ?string $pageImage;
    public ?Page $parent;
    public array $metaKeywords;
    public ?string $metaDescription;

    public function full_image(){
        return get_base_url().$this->pageImage;
    }

    public  function  full_url()  {
        return get_base_url().$this->href;
    }


    public function __construct(
        string $href, string $title, 
        ?Page $parent = null, array $metaKeywords = null,
        $pageDescription = null, $pageImage = null, ?string $metaDescription = null
    )
    {
        $this->href = $href;
        $this->title = $title;
        $this->parent = $parent;
        $this->pageDescription = $pageDescription;
        $this->pageImage = $pageImage;
        $this->metaDescription = $metaDescription;

        if ($metaKeywords != null)
            $this->metaKeywords = $metaKeywords;
        else
            $this->metaKeywords = [];
    }

    public function print_link()
    {
        ?>
                <a href="<?php echo $this->href ?>">
                    <?php echo $this->title ?>
                </a>
                <?php
    }
}

Page::$home = new Page(
    '/',
    'Начало',
    metaKeywords: ['Начало', 'Изолации', 'Изолация', 'Христофоров', 'Въпроси', 'Саниране', 'Материали'],
    pageDescription: 'Христофоров - Топлоизолации, Саниране - Начална страница и често задавани въпроси',
    pageImage: '/images/orange-building-small.png',
    metaDescription: 'Христофоров Билд - Топлоизолации и фугиране - начална страница - често задавани въпроси'
);
Page::$gallery = new Page(
    '/gallery',
    'Галерия',
    parent: Page::$home,
    metaKeywords: ['Галерия', 'Изолации', 'Кооперации', 'Къщи', 'Вили', 'Работа', 'Снимки'],
    pageDescription: 'Христофоров - Галерия саниране - топлоизолации на блокове, кооперации и вили',
    pageImage: '/images/orange-building-small.png',
    metaDescription: 'Христофоров Билд - Топлоизолации и фугиране - галерия - снимки и описание - жилищни сгради по европроекти'
);
Page::$about = new Page(
    '/about',
    'За нас - история', parent: Page::$home,
    metaKeywords: ['Христофоров', 'Фирма', 'История', 'Саниране', 'Алпинизъм', 'Изолации'],
    pageDescription: 'Христофоров - За нас - топлоизолации на жилищни сгради',
    pageImage: '/images/orange-building-small.png',
    metaDescription: 'Христофоров Билд - Топлоизолации и фугиране - за нас - история и опит'
);
Page::$privacyPolicy = new Page(
    '/privacy-policy',
    'Поверителност и лични данни', parent: Page::$home,
    metaKeywords: ['Поверителност', 'Лични данни', 'GDPR', 'Условия за ползване', 'Бисквитки'],
    pageDescription: 'Христофоров - Политика за поверителност',
    pageImage: '/images/orange-building-small.png',
    metaDescription: 'Христофоров Билд - Топлоизолации и фугиране - GDPR и политика за поверителност'
);
Page::$contact = new Page(
    '/contact',
    'Контакти', parent: Page::$home,
    metaKeywords: ['Христофоров', 'Контакти', 'Адрес', 'София', 'Топлоизолация', 'Изолация', 'Симеоновско шосе'],
    pageDescription: 'Христофоров - Контакти',
    pageImage: '/images/orange-building-small.png',
    metaDescription: 'Христофоров Билд - Свържи се с нас - '.CONTACT_PHONE.' - '.CONTACT_EMAIL
);

function render_page(Page $page, $renderContent)
{
    $pageTitleFull = $page->title . ' - ' . SITE_TITLE;
    $metaKeywords = join(", ", $page->metaKeywords);


    $breadcrumbPages = [];
    for ($element = $page; $element != null; $element = $element->parent)
        array_push($breadcrumbPages, $element);
    array_reverse($breadcrumbPages);


    $breadcrumbJson = [];
    $breadcrumbJson['@context'] = 'https://schema.org';
    $breadcrumbJson['@type'] = 'BreadcrumbList';
    $breadcrumbElements = [];
    for ($i = 0; $i < count($breadcrumbPages); $i++) {
        $element = [];
        $element['@type'] = 'ListItem';
        $element['position'] = $i + 1;
        $element['item'] = $page->full_url();
        $element['name'] = $page->title;

        array_push($breadcrumbElements, $element);
    }
    $breadcrumbJson['itemListElement'] = $breadcrumbElements;

    $breadcrumbJsonText = json_encode($breadcrumbJson, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    ?>

        <!DOCTYPE HTML>
        <!--
                                                                                                                                                                                                                                                                                                            Editorial by HTML5 UP
                                                                                                                                                                                                                                                                                                            html5up.net | @ajlkn
                                                                                                                                                                                                                                                                                                            Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
                                                                                                                                                                                                                                                                                                        -->
        <html>

        <head>
            <title>
                <?php echo $pageTitleFull ?>
            </title>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
            <link rel="stylesheet" href="/assets/css/main.css" />
            <script type="application/ld+json"><?php echo $breadcrumbJsonText; ?></script>


            <!--OpenGraph: https://developers.facebook.com/docs/sharing/webmasters/ -->
            <meta  property = "og:url" content="<?php echo $page->full_url();?>"/>
            <meta  property = "og:type" content="article"/>
            <meta  property = "og:title" content="<?php echo ($page->title.' - '.COMPANY_NAME_Short)?>"/>
            <meta  property = "og:description" content="<?php  echo $page->pageDescription?>"/>
            <meta  property = "og:image" content="<?php  echo $page->full_image()?>"/>

            <?php

            if($page->metaDescription!=null){
                ?>
                <meta name="description" content="<?php echo $page->metaDescription;?>"/>
                <?php
            }

            ?>

            <?php
            if (strlen($metaKeywords) > 0) {
                ?>
                    <meta name="keywords" content="<?php echo $metaKeywords ?>">
                    <?php
            }
            ?>

        </head>

        <body class="is-preload">

            <!-- Wrapper -->
            <div id="wrapper">

                <!-- Main -->
                <div id="main">
                    <div class="inner">

                        <!-- Header -->
                        <header id="header">
                            <a href="/" class="logo"><strong>Христофоров</strong> - Топлоизолации &#8226; Фугиране</a>
                            <ul class="icons">
                                <li><a href="https://twitter.com/hristoforov_b" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                                <li><a href="https://www.facebook.com/hristoforov.build" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                                <!-- <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li> -->
                            </ul>
                        </header>

                        <!-- Content -->


                        <?php
                        $renderContent();
                        ?>

                    </div>
                </div>

                <!-- Sidebar -->
                <div id="sidebar">
                    <div class="inner">

                        <!-- Search -->
                        <section id="search" class="alt">
                            <form method="post" action="#">
                                <input type="text" name="query" id="query" placeholder="Търсене в сайта" />
                            </form>
                        </section>

                        <!-- Menu -->
                        <nav id="menu">
                            <header class="major">
                                <h2>Меню</h2>
                            </header>
                            <ul>
                                <li><?php Page::$home->print_link(); ?></li>
                                <li><?php Page::$gallery->print_link(); ?></li>
                                <li>
                                    <span class="opener">За нас</span>
                                    <ul>
                                        <li><?php Page::$about->print_link(); ?></li>
                                        <li><?php Page::$privacyPolicy->print_link(); ?></li>
                                    </ul>
                                </li>
                                <li><?php Page::$contact->print_link(); ?></li>
                            </ul>
                        </nav>

                        <!-- Section -->
                        <section>
                            <header class="major">
                                <h2>Свържи се с нас</h2>
                            </header>
                            <!-- <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem
                                                                                                                                                                                                                                    ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat
                                                                                                                                                                                                                                    tempus aliquam.</p> -->
                            <?php render_contacts(); ?>
                        </section>

                        <!-- Footer -->
                        <footer id="footer">
                            <p class="copyright">
                                &copy; 2022-2023 <?php echo COMPANY_NAME_Legal ?>
                                <br />
                                Всички права запазени.
                            </p>
                        </footer>

                    </div>
                </div>

            </div>

            <!-- Scripts -->
            <script src="/assets/js/jquery.min.js"></script>
            <script src="/assets/js/browser.min.js"></script>
            <!-- <script src="/assets/js/breakpoints.min.js"></script> -->
            <!-- <script src="/assets/js/util.js"></script> -->
            <script src="/assets/js/main.js"></script>

        </body>

        </html>


        <?php
}

function render_contacts($includeMap = false)
{
    ?>
        <section>
            <ul class="contact">
                <li class="icon solid fa-envelope"><a href="<?php echo 'mailto://' . CONTACT_EMAIL ?>">
                        <?php echo CONTACT_EMAIL ?>
                    </a></li>
                <li class="icon solid fa-phone"><a href="<?php echo 'tel://' . CONTACT_PHONE ?>">
                        <?php echo CONTACT_PHONE ?>
                    </a></li>
                <li class="icon solid fa-home">
                    <?php echo CONTACT_ADDRESS ?><br />
                </li>
                <li class="icon solid fa-briefcase">
                    <?php echo CONTACT_WORKING_HOURS ?><br />
                </li>
            </ul>

            <?php
            if ($includeMap) {
                ?> <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.8424895372773!2d23.331786315877615!3d42.643499025146475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40aa8411b5a43ff3%3A0x183f7bf70ea45826!2sBoulevard%20%22Simeonovsko%20Shose%20102%2C%201700%20Kv.%20Vitosha%2C%20Sofia!5e0!3m2!1sen!2sbg!4v1674077189032!5m2!1sen!2sbg"
                        style="border:0; width: 100%; height: 500px;" allowfullscreen="false" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <?php
            }
            ?>
        </section>

        <?php
}

?>