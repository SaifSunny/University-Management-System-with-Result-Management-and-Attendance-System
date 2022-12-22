<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>University Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./includes.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <header class="p-3 text-white" style="background:#1690A7">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <h1>UMS</h1>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0"
                        style="padding-left:30%;">
                        <li><a href="#home" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="#about" class="nav-link px-2 text-white">About</a></li>
                        <li><a href="#testimonial" class="nav-link px-2 text-white">Tesimonial</a></li>
                        <li><a href="#department" class="nav-link px-2 text-white">Department</a></li>
                    </ul>
                    <div class="dropdown me-2">
                        <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="./admin_login.php">Admin</a></li>
                            <li><a class="dropdown-item" href="./faculty_login.php">Faculty</a></li>
                            <li><a class="dropdown-item" href="./student_login.php">Student</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Signup
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="./faculty_signup.php">Faculty</a></li>
                            <li><a class="dropdown-item" href="./student_signup.php">Student</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header-->
        <header class="py-5" id="home">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder mb-2" style="padding-bottom:15px;">Welcome to Eastern
                                University</h1>
                            <p class="lead fw-normal mb-4">Eastern University is widely known for its quality education,
                                superior faculty composition, excellent academic environment, sincere care for students,
                                extensive co and extra- curricular activities, successful internship and job placement,
                                modern digital library, good governance and administration and convenient location of
                                the campus.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                            src="./images/uni.jpg" alt="..." /></div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5" id="about">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0">Campus, Facilities and Services</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                        class="bi bi-collection"></i></div>
                                <h2 class="h5">Campus</h2>
                                <p class="mb-0">The present campus consisting of four large buildings is located in
                                    Dhanmondi which is easily accessible from all parts and outskirts of Dhaka city.
                                    Just at a distance of three minutes walk from the campus is the scenic lake and
                                    refreshing park of Dhanmondi where students can stroll and relax <a
                                        href="#"><br><br><span>See More</span></a></p>
                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                        class="bi bi-building"></i></div>
                                <h2 class="h5">Hostel for Students</h2>
                                <p class="mb-0">The University has arrangement of a female hostel located nearby the
                                    campus. Similar hostel accommodation is available for male students also. Full
                                    fledged and comfortable hostel facilities will be available for all students in the
                                    University campus under construction in Ashlia.<a href="#"><br><br><span>See
                                            More</span></a></p>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                        class="bi bi-toggles2"></i></div>
                                <h2 class="h5">Library</h2>
                                <p class="mb-0">The digital library of the University has more than 15000 books, over
                                    100 national and international research journals, 700 audio visual materials, 25000
                                    online journals and a large number of eBooks through 41databases.The library
                                    services can be accessed any time of the day and night over internet from
                                    anywhere.<a href="#"><br><br><span>See More</span></a></p>
                            </div>
                            <div class="col h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                        class="bi bi-toggles2"></i></div>
                                <h2 class="h5">Clubs and Forums</h2>
                                <p class="mb-0">The University has 16 different clubs and forums for students to pursue
                                    their academic, social, cultural, athletic & other interests.The Office of Students
                                    Affairs (OSA) organizes Co-curricular & Extra-curricular activities of the students
                                    through clubs and forums.<a href="#"><br><br><span>See More</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section-->
        <div class="py-5 bg-light" id="testimonial">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">"I currently work in a software company as a Managing
                                Director. I’m managing all company task from start to finish. My regular job is
                                distributing task to concern department and follow-up there task. I love to work in
                                team"</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" width=10% src="./images/stu.jpg" alt="..."
                                    style="width=20%" />
                                <div class="fw-bold">
                                    Yousuf Al Azad
                                    <span class="fw-bold text-primary mx-1">/</span>
                                    Current Managing Director at Azoncode Ltd.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Department section-->
        <section class="py-5" id="department">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-10">
                        <div class="text-center">
                            <h2 class="fw-bolder">Faculties and Programs</h2>
                            <p class="lead fw-normal text-muted mb-5">The University has at present four faculties:
                                Faculty of Arts, Faculty of Business Administration, Faculty of Engineering and
                                Technology and Faculty of Law. Faculty of Science and Faculty of Social Science will be
                                added soon.</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-3 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="./images/art.png" alt="..." />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">Faculty of Arts</h5>
                                </a>
                                <p class="card-text mb-0">The Faculty of Arts offers a four year B.A. (Hons.) in English
                                    and a one-year M.A. in ELL (English Language and Literature). The Programs follow a
                                    needs-based multi syllabus approach combining well-balanced language and literature
                                    courses in order to cater to the job needs of its graduates. A well- earned degree
                                    in English opens innumerable job opportunities at home and abroad.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="./images/bus.png" alt="..." />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">Faculty of Business Administration</h5>
                                </a>
                                <p class="card-text mb-0">The Faculty of Business Administration (FBA) delivers
                                    innovative and world className leadership education in business. Its highly
                                    qualified faculty members with extensive research experience and international
                                    exposure provide tailor-made support to enable learning and development of the
                                    student groups to become professional managers as well as good human beings.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="./images/eng.jpg" alt="..." />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">Faculty of Engineering & Technology</h5>
                                </a>
                                <p class="card-text mb-0">The Faculty of Engineering & Technology (E&T) offers four
                                    years B.Sc. Programs in Electrical & Electronic Engineering (EEE) and Computer
                                    Science & Engineering (CSE). It also offers a one year Master of Computer Science
                                    program. The Faculty attracts talented and outstanding faculty members with foreign
                                    degrees to nurture young students in various fields of engineering and technology.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="./images/law.jpg" alt="..." />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="#">
                                    <h5 class="card-title mb-3">Faculty of Law</h5>
                                </a>
                                <p class="card-text mb-0">The Faculty of Law of Eastern University is one of the premier
                                    law schools of the country. It has always attracted the best legal minds
                                    academically and ideologically, thereby creating an inspirational centre of
                                    exchanging ideas. It is a public-spirited faculty that makes distinctive
                                    contributions to society in learning, teaching and engagement. EU`s law curricula
                                    reflect the changing requirement of the legal profession. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include_once("./templates/footer.php");?>
</body>

</html>