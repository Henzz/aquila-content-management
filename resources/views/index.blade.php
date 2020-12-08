@extends('layouts.app')

@section('content')

	<title>Home</title>
            @guest
                <div class="content">
                    <h1 style="text-align: center;">Welcome To Aquila Content Management System</h1>
                    <h2>Important globals</h2>
                    <p> Bootstrap employs a handful of important global styles and settings that you’ll need to be aware of when using it, all of which are almost exclusively geared towards the normalization of cross browser styles. Let’s dive in.
                        HTML5 doctype

                        Bootstrap requires the use of the HTML5 doctype. Without it, you’ll see some funky incomplete styling, but including it shouldn’t cause any considerable hiccups.</p>
                    <h2>Responsive meta tag</h2>
                    <p>Bootstrap is developed mobile first, a strategy in which we optimize code for mobile devices first and then scale up components as necessary using CSS media queries. To ensure proper rendering and touch zooming for all devices, add the responsive viewport meta tag to your </&head>.</p>
                    <h2>Important globals</h2>
                    <p>Bootstrap is developed mobile first, a strategy in which we optimize code for mobile devices first and then scale up components as necessary using CSS media queries. To ensure proper rendering and touch zooming for all devices, add the responsive viewport meta tag to your head.
                    </p>
                </div>
            @else
                <div class="container">
                    <h1 style="text-align: center; font-size:60px;">Welcome To The Home Page</h1>

                    <h2><strong>Content Management System (CMS)</strong></h2>
                    <img class=" mx-auto d-block" src="/cms.jpg" style="width:60%; height:auto;">
                    <p>content management system, often abbreviated as CMS, is software that helps users create, manage, and modify content on a website without the need for specialized technical knowledge.

                        In simpler language, a content management system is a tool that helps you build a website without needing to write all the code from scratch (or even know how to code at all).

                        Instead of building your own system for creating web pages, storing images, and other functions, the content management system handles all that basic infrastructure stuff for you so that you can focus on more forward-facing parts of your website.

                        Beyond websites, you can also find content management systems for other functions – like document management.</p>

                        <ul>
                            <li>How Does a Content Management System Work?</li>
                            <li>What Are Examples of Popular Content Management Systems?</li>
                            <li>What Is the Best CMS Platform?</li>
                            <li>How to Build a Website with a Content Management System</li>
                        </ul>

                        <h2> Does a Content Management System Work?</h2>

                        <p> give you an idea of how a content management system works, we’re going to take a whirlwind tour of the WordPress interface (WordPress is a good example of a content management system).

                        Let’s start with creating a piece of content. Without a content management system, you’d need to write a static HTML file and upload it to your server (sounds complicated, right?).

                        With a content management system like WordPress, you can just write your content in an interface that looks a good bit like Microsoft Word:

                        </p>

                        <img class=" mx-auto d-block" src="/Mcms.jpg" style="width:60%; height:auto; margin-left:5%;">
                        <img class=" mx-auto d-block" src="/M2cms.jpg" style="width:60%; height:auto; margin-left:5%;">

                        <p>
                        That’s a lot simpler, right?

                        Similarly, to upload and manage media, like images, you can just browse the media library instead of needing to actually interact with your web server directly:
                        WordPress media library

                        How you manage images and other media with a content management system

                        The content management system isn’t just a backend management interface, though. It also makes all of the content that you create show up for your visitors exactly like you want it to.

                        </p>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endguest
	</div>
@endsection
