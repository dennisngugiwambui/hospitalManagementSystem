@extends('homepages.app')

@section('content')

<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 text-center">
                        <h2>Departments</h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
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
    <!-- department area_end  -->
    </main>

@endsection
