@extends('homepages.app')

@section('content')
<!--? slider Area Start-->
<div class="slider-area position-relative">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                        <div class="hero__caption">
                            <span>Committed to success</span>
                            <h1 class="cd-headline letters scale">We care about your
                                <strong class="cd-words-wrapper">
                                    <b class="is-visible">health</b>
                                    <b>Well-Being</b>
                                    <b>Happiness</b>
                                </strong>
                            </h1>
                            <p data-animation="fadeInLeft" data-delay="0.1s">We are always your trusted source for reliable health information and resources through empowering you to live a healthier life</p>
                            <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                        <div class="hero__caption">
                            <span>Committed to success</span>
                            <h1 class="cd-headline letters scale">We care about your
                                <strong class="cd-words-wrapper">
                                    <b class="is-visible">health</b>
                                    <b>Well-Being</b>
                                    <b>Happiness</b>
                                </strong>
                            </h1>
                            <p data-animation="fadeInLeft" data-delay="0.1s">We strive to provide exceptional medical care and personalized attention to each of our patients..</p>
                            <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!--? About Start-->
<div class="about-area section-padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10">
                <div class="about-caption mb-50">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 mb-35">
                        <span>About Our Company</span>
                        <h2>Welcome To Our Hospital</h2>
                    </div>
                    <p>We are committed towards maintaining the highest standards of excellence in healthcare services. Our team of experienced physicians, nurses, and staff members work together to provide a comprehensive range of medical services to our patients, from routine check-ups to complex procedures and surgeries.</p>
                    <div class="about-btn1 mb-30">
                        <a href="/doctors" class="btn about-btn">Find Doctors .<i class="ti-arrow-right"></i></a>
                    </div>
                    <div class="about-btn1 mb-30">
                        <a href="{{ route('appointments') }}" class="btn about-btn2">Appointment <i class="ti-arrow-right"></i></a>
                    </div>
                    <div class="about-btn1 mb-30">
                        <a href="/home" class="btn about-btn2">Emargency 1 <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <!-- about-img -->
                <div class="about-img ">
                    <div class="about-font-img d-none d-lg-block">
                        <img src="{{ asset('homepages/assets/img/gallery/about2.png') }}" alt="">
                    </div>
                    <div class="about-back-img ">
                        <img src="{{ asset('homepages/assets/img/gallery/about1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About  End-->
<!--? department_area_start  -->
<div class="department_area section-padding2">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center mb-100">
                    <span>Our Departments</span>
                    <h2>Our Medical Services</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="depart_ment_tab mb-30">
                    <!-- Tabs Buttons -->
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                <i class="flaticon-teeth"></i>
                                <h4>Dentistry</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="flaticon-cardiovascular"></i>
                                <h4>Cardiology</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                <i class="flaticon-ear"></i>
                                <h4>ENT Specialists</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Astrology-tab" data-toggle="tab" href="#Astrology" role="tab" aria-controls="contact" aria-selected="false">
                                <i class="flaticon-bone"></i>
                                <h4>Astrology</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Neuroanatomy-tab" data-toggle="tab" href="#Neuroanatomy" role="tab" aria-controls="contact" aria-selected="false">
                                <i class="flaticon-lung"></i>
                                <h4>Neuroanatomy</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Blood-tab" data-toggle="tab" href="#Blood" role="tab" aria-controls="contact" aria-selected="false">
                                <i class="flaticon-cell"></i>
                                <h4>Blood Screening</h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="dept_main_info white-bg">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!-- single_content  -->
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>Dentist with surgical mask holding <br> scaler near patient</h3 >
                                <p>surgical mask holding a scaler near a patient is a reassuring sight for those seeking dental care. It represents the commitment of dental professionals to providing safe, effective, and compassionate care to their patients, and the importance of maintaining good oral health for a lifetime of healthy smiles. </p>
                                <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="{{ asset('homepages/assets/img/gallery/department_man.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single_content  -->
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- single_content  -->
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>Focusing on the diagnosis, treatment, and prevention <br> of cardiovascular diseases</h3 >
                                <p>We are used to helping solve Cardiology and heart disease. Once a diagnosis is made, cardiologists develop treatment plans that may include medication, lifestyle changes, or surgical interventions such as coronary artery bypass grafting or heart valve repair or replacement. </p>
                                <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="{{ asset('homepages/assets/img/gallery/department_man.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single_content  -->
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <!-- single_content  -->
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>Experts for the care of Ears, Nose and Throat </h3 >
                                <p>Our team of ENT specialists provides a comprehensive range of services to patients of all ages, including:

                                    <br>1. Hearing evaluation and treatment for hearing loss<br>
                                    2. Management of ear infections and other ear conditions <br>
                                    3. Evaluation and treatment of nasal and sinus disorders, including allergies and chronic sinusitis <br>
                                    4. Diagnosis and treatment of voice and swallowing disorders <br>
                                    5. Evaluation and treatment of sleep apnea and other sleep disorders <br>
                                    6. Management of head and neck cancers and other complex conditions <br>
                                    7. Pediatric ENT services, including the evaluation and treatment of ear infections and tonsil and adenoid disorders </p>
                                <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="{{ asset('homepages/assets/img/gallery/department_man.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single_content  -->
                </div>
                <div class="tab-pane fade" id="Astrology" role="tabpanel" aria-labelledby="Astrology-tab">
                    <!-- single_content  -->
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>Our astrology services are provided by experienced and knowledgeable astrologers</h3 >
                                <p>At our practice, we offer a wide range of astrology services, including: <br>

                                    1. Natal chart readings: A natal chart is a map of the sky at the time of an individual's birth. By analyzing a person's natal chart, we can gain insight into their personality traits, strengths, weaknesses, and potential life paths. <br>

                                    2. Relationship compatibility readings: By comparing the natal charts of two individuals, we can assess the potential for a successful relationship, including areas of compatibility and areas of challenge. <br>

                                    3. Electional astrology: This is the practice of selecting the best possible time to begin a new project or undertake a significant life event, such as a wedding or business launch. <br>

                                    4. Predictive astrology: This is the practice of using astrological tools to make predictions about future events or trends, including trends in politics, economics, and social affairs. </p>
                                <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="{{ asset('homepages/assets/img/gallery/department_man.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single_content  -->
                </div>
                <div class="tab-pane fade" id="Neuroanatomy" role="tabpanel" aria-labelledby="Neuroanatomy-tab">
                    <!-- single_content  -->
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>Experienced in the architecture of the human soul </h3 >
                                <p>Our neuroanatomy services may include: <br>

                                    1. Neurological evaluation and testing: Our team can perform a variety of tests to assess brain function and other aspects of neurological health. <br>

                                    2. Neurosurgical procedures: Our team of neurosurgeons is skilled in a range of surgical procedures to address neurological conditions. <br>

                                    3. Non-invasive brain stimulation: We offer non-invasive brain stimulation techniques such as transcranial magnetic stimulation (TMS) and transcranial direct current stimulation (tDCS) to treat various neurological conditions. <br>

                                    4. Rehabilitation services: We provide rehabilitation services to support patients recovering from neurological injuries or conditions, such as physical therapy, speech therapy, and occupational therapy. </p>
                                <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="{{ asset('homepages/assets/img/neutronomy.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single_content  -->
                </div>
                <div class="tab-pane fade" id="Blood" role="tabpanel" aria-labelledby="Blood-tab">
                    <!-- single_content  -->
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <h3>Screening tests save lives, but only if the right people are screened at the right time</h3 >
                                <p>Our blood screening services may include: <br>

                                    1. Routine blood tests: These tests are performed as part of a routine medical check-up and can provide important information about a person's overall health. <br>

                                    2. Diagnostic blood tests: These tests are performed to diagnose specific medical conditions, such as anemia, diabetes, or certain types of cancer. <br>

                                    3. Blood donation screening: Our team performs blood screening for donors to ensure the safety and efficacy of the blood supply. </p>
                                <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="{{ asset('homepages/assets/img/blood-screening.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single_content  -->
                </div>
                </div>
        </div>

    </div>
</div>
<!-- depertment area end  -->
 <!--? Gallery Area Start -->
 <div class="gallery-area section-padding30">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                    <span>Our Gellary</span>
                    <h2>Our Medical Camp</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Left -->
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url(homepages/assets/img/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url(homepages/assets/img/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url(homepages/assets/img/gallery/gallery3.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right -->
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url(homepages/assets/img/gallery/gallery4.png);"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url(homepages/assets/img/gallery/gallery5.png);"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url(homepages/assets/img/gallery/gallery6.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery Area End -->
<!--? All startups Start -->
<div class="all-starups-area testimonial-area fix">
    <!-- left Contents -->
    <div class="starups">
        <!--? Testimonial Start -->
        <div class="h1-testimonial-active">
            <!-- Single Testimonial -->
            <div class="single-testimonial text-center">
                <!-- Testimonial Content -->
                <div class="testimonial-caption ">
                    <div class="testimonial-top-cap">
                        <img src="homepages/assets/img/gallery/testimonial.png" alt="">
                        <p>“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for yout hard.”</p>
                    </div>
                    <!-- founder -->
                    <div class="testimonial-founder d-flex align-items-center justify-content-center">
                        <div class="founder-img">
                            <img src="homepages/assets/img/gallery/Homepage_testi.png" alt="">
                        </div>
                        <div class="founder-text">
                            <span>Margaret Lawson</span>
                            <p>Chif Operation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    </div>
    <!--Right Contents  -->
    <div class="starups-img"></div>
</div>
<!--All startups End -->
 <!--? Team Start -->
 <div class="team-area section-padding30">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                    <span>Our Doctors</span>
                    <h2>Our Specialist</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single Tem -->
            @foreach ($doctor as $doctor)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                <div class="single-team mb-30">
                    <div class="team-img">
                        <img src="imagename/{{$doctor->image}}" style="width:360px; height:444px" alt="">
                    </div>
                    <div class="team-caption">
                        <h3><a href="#">{{ $doctor->name }}</a></h3>
                        <span>{{ $doctor->speciality }}</span>
                        <!-- Team social -->
                        <div class="team-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                <div class="single-team mb-30">
                    <div class="team-img">
                        <img src="homepages/assets/img/gallery/team1.png" alt="">
                    </div>
                    <div class="team-caption">
                        <h3><a href="#">Angela Doe</a></h3>
                        <span>Surgeon</span>
                        <!-- Team social -->
                        <div class="team-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
 <!--? Contact form Start -->
 <div class="contact-form-main">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-7 col-lg-7">
                <div class="form-wrapper">
                    <!--Section Tittle  -->
                    <div class="form-tittle">
                        <div class="row ">
                            <div class="col-xl-12">
                                <div class="section-tittle section-tittle2">
                                    <span>Appointment Apply Form</span>
                                    <h2>Book Appointment</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Section Tittle  -->
                    <form id="contact-form" action="{{ route('appointment_add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box user-icon mb-30">
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box email-icon mb-30">
                                    <input type="text" name="phone" placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-30">
                                <div class="select-itms">
                                    <select name="doctor" id="select2" required>
                                        <option disabled selected>--select doctor--</option>
                                        @foreach ($user as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }} - {{ $user->speciality }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box subject-icon mb-30">
                                    <input type="Email" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-box message-icon mb-65">
                                    <textarea name="message" id="message" placeholder="Message" required></textarea>
                                </div>
                                <div class="submit-info">
                                    <button class="btn" type="submit">Submit Now <i class="ti-arrow-right"></i> </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- contact left Img-->
    <div class="from-left d-none d-lg-block">
        <img src="homepages/assets/img/gallery/contact_form.png" alt="">
    </div>
</div>
<!-- Contact form End -->
<!--? gallery Products Start -->
<div class="gallery-area fix">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="gallery-box">
                    <div class="single-gallery">
                        <div class="gallery-img " style="background-image: url(homepages/assets/img/gallery/gallery1.png);"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="gallery-box">
                    <div class="single-gallery">
                        <div class="gallery-img " style="background-image: url(homepages/assets/img/gallery/gallery2.png);"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="gallery-box">
                    <div class="single-gallery">
                        <div class="gallery-img " style="background-image: url(homepages/assets/img/gallery/gallery3.png);"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="gallery-box">
                    <div class="single-gallery">
                        <div class="gallery-img " style="background-image: url(homepages/assets/img/gallery/gallery4.png);"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="gallery-box">
                    <div class="single-gallery">
                         <div class="gallery-img " style="background-image: url(homepages/assets/img/gallery/gallery5.png);"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="gallery-box">
                    <div class="single-gallery">
                        <div class="gallery-img " style="background-image: url(homepages/assets/img/gallery/gallery6.png);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- gallery Products End -->
<!--? Blog start -->
<div class="home_blog-area section-padding30">
    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="cl-xl-7 col-lg-8 col-md-10">
                <!-- Section Tittle -->
                <div class="section-tittle text-center mb-70">
                    <span>Oure recent news</span>
                    <h2>OurNews From Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-blogs mb-30">
                    <div class="blog-img">
                        <img src="homepages/assets/img/gallery/blog1.png" alt="">
                    </div>
                    <div class="blogs-cap">
                        <div class="date-info">
                            <span>Health</span>
                            <p>Nov 30, 2020</p>
                        </div>
                        <h4><a href="blog_details.html">Amazing Places To Visit In Summer</a></h4>
                        <a href="blog_details.html" class="read-more1">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-blogs mb-30">
                    <div class="blog-img">
                        <img src="homepages/assets/img/gallery/blog2.png" alt="">
                    </div>
                    <div class="blogs-cap">
                        <div class="date-info">
                            <span>Checkup</span>
                            <p>Nov 30, 2020</p>
                        </div>
                        <h4><a href="blog_details.html">Developing Creativithout Losing Visual</a></h4>
                        <a href="blog_details.html" class="read-more1">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-blogs mb-30">
                    <div class="blog-img">
                        <img src="homepages/assets/img/gallery/blog3.png" alt="">
                    </div>
                    <div class="blogs-cap">
                        <div class="date-info">
                            <span>Operation</span>
                            <p>Nov 30, 2020</p>
                        </div>
                        <h4><a href="blog_details.html">Winter Photography Tips from Glenn</a></h4>
                        <a href="blog_details.html" class="read-more1">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->




@endsection
