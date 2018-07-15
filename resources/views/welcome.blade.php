<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>伯乐网课</title>

        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            /*html, body {*/
                /*background-color: #fff;*/
                /*color: #636b6f;*/
                /*font-family: 'Raleway', sans-serif;*/
                /*font-weight: 100;*/
                /*height: 100vh;*/
                /*margin: 0;*/
            /*}*/
            /* GLOBAL STYLES
-------------------------------------------------- */
            /* Padding below the footer and lighter body text */

            body {
                padding-top: 5rem;
                padding-bottom: 3rem;
                color: #5a5a5a;
            }


            /* CUSTOMIZE THE CAROUSEL
            -------------------------------------------------- */

            /* Carousel base class */
            .carousel {
                margin-bottom: 1rem;
            }
            /*!* Since positioning the image, we need to help out the caption *!*/
            /*.carousel-caption {*/
                /*bottom: 3rem;*/
                /*z-index: 10;*/
            /*}*/

            /*!* Declare heights because of positioning of img element *!*/
            /*.carousel-item {*/
                /*height: 32rem;*/
                /*background-color: #777;*/
            /*}*/
            .carousel-item > img {
                /*position: absolute;*/
                /*top: 0;*/
                /*left: 0;*/
                /*min-width: 100%;*/
                /*height: 32rem;*/
            }


            /* MARKETING CONTENT
            -------------------------------------------------- */

            /* Center align the text within the three columns below the carousel */
            .marketing .col-lg-4 {
                margin-bottom: 1.5rem;
                text-align: center;
            }
            .marketing h2 {
                font-weight: 400;
            }
            .marketing .col-lg-4 p {
                margin-right: .75rem;
                margin-left: .75rem;
            }


            /* Featurettes
            ------------------------- */

            .featurette-divider {
                margin: 5rem 0; /* Space out the Bootstrap <hr> more */
            }

            /* Thin out the marketing headings */
            .featurette-heading {
                font-weight: 300;
                line-height: 1;
                letter-spacing: -.05rem;
            }


            /* RESPONSIVE CSS
            -------------------------------------------------- */

            @media (min-width: 40em) {
                /* Bump up size of carousel content */
                /*.carousel-caption p {*/
                    /*margin-bottom: 1.25rem;*/
                    /*font-size: 1.25rem;*/
                    /*line-height: 1.4;*/
                /*}*/

                .featurette-heading {
                    font-size: 50px;
                }
            }

            @media (min-width: 62em) {
                /*.carousel-heading {*/
                    /*margin-top: 7rem;*/
                /*}*/
            }

        </style>
    </head>
    <body>
        @include('components.nav')
        <div class="container rounded">
            <div id="features-carousel" class="carousel slide rounded" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#features-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#features-carousel" data-slide-to="1" class=""></li>
                    <li data-target="#features-carousel" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class=" carousel-item active">
                        <a href="#">
                            <img class="rounded d-block w-100" src="{{ asset('storage/thumbnails/carousel-1.jpg') }}" alt="First slide">
                        </a>
                    </div>
                    <div class="rounded carousel-item">
                        <a href="#">
                            <img class="rounded d-block w-100" src="{{ asset('storage/thumbnails/carousel-2.jpg') }}" alt="Second slide">
                        </a>
                    </div>
                    <div class="rounded carousel-item">
                        <a href="#">
                            <img class="rounded d-block w-100" src="{{ asset('storage/thumbnails/carousel-3.jpg') }}" alt="Third slide">
                        </a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#features-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#features-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container marketing">

            <div class="card-columns">
                @foreach($courses as $course)
                    @include('components.course-card', ['course' => $course])
                @endforeach
                @foreach($videos as $video)
                    @include('components.video-card', ['video' => $video])
                @endforeach
                @foreach($notes as $note)
                    @include('components.note-card', ['note' => $note])
                @endforeach
            </div>

            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">严格：<span class="text-muted">入驻导师审核</span></h2>
                    <p class="lead">伯乐网课对于每位入驻导师的高考分数有基本条件，此外，我们也要求导师在某一科目有比较突出的表现，且表达能力强、沟通能力强。</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" alt="导师审核" src="{{ asset('storage/images/feature-1.png') }}" data-holder-rendered="true">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">多样：<span class="text-muted">开展家教服务</span></h2>
                    <p class="lead">伯乐网课在2018年暑假同时开展家教服务。如果学员对某位老师的课程非常满意，或有较复杂问题希望得到老师长期一对一帮助，可以通过本平台联系老师。</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" alt="家教服务" src="{{ asset('storage/images/feature-2.png') }}" data-holder-rendered="true" >
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">专业：<span class="text-muted">资深运营团队</span></h2>
                    <p class="lead">伯乐网课的三位创始人在高中时即拥有多个项目的管理经验，从产品设计、开发到运营、宣传均有涉猎。伯乐网课平台技术部门经验丰富，拥有三个大型网站项目的实战开发经验。</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" alt="运营团队" src="{{ asset('storage/images/feature-3.png') }}" data-holder-rendered="true">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
