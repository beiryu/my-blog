@extends('layout')

@section('main')
<!-- main -->
<main class="container">
  <section class="single-blog-post">
    <h1>About Me</h1>
    <div class="single-blog-post-ContentImage" data-aos="fade-left">
      <img src="{{ asset('images/photography.jpg') }}" alt="" />
    </div>

    <div>
      
      <div class="about-text">
        <p>Chào các bạn, mình là <b>Đinh Nguyên Khánh</b>, tác giả của blog.</p>
        <h2>About me</h2>
        <ul class="container">
          <li>Mình là sinh viên chuyên ngành Computer Science khoá 2019, trường Đại Học Khoa Học Tự Nhiên, Hồ Chí Minh.</li>
          <li>Trong khi học năm 3, mình làm việc ở Hybrid Teachnology HCM ở vị trí backend dev intern được 3 tháng rồi nghỉ. Sau khi dừng làm việc tại công ty đó, mình tiếp tục học và viết blog.</li>
          <li>Các bạn quan tâm có thể xem thêm Resume ở dưới đây.</li>
        </ul>
        <br>
        <h2>Resume</h2>
        <br>
        <h3>Technical Skills</h3>
        <ul class="container">
          <li>Coding Languages: PHP, JavaScript, Python, HTML/CSS.</li>
          <li>Platforms/ Frameworks: Laravel, VueJs, ReactJs, Bootstrap</li>
          <li>Version Control/ Systems/ Tools: Git, Docker, Linux, Vim</li>
        </ul>
        <br>
        <h3>Working Experiences</h3>
        <br>
        <h5>Hybrid Technologies Viet Nam</h5>
        <p>Ho Chi Minh, October 2022 - January 2023 (3 months)</p>
        <ul class="container">
          <li>Project: Internal Communication System</li>
          <li>Description</li>
          <ul style="margin-left: 4%">
            <li>Participate in product and project development according to the company's standard process from design, code, test.</li>
            <li>Business analysis, design, and system building under the guidance of professional mentors.</li>
          </ul>
          <li>Team size: 10</li>
          <li>Position: Back-end Developer Intern</li>
          <li>Responsibilities:</li>
          <ul style="margin-left: 4%">
            <li>Design Database.</li>
            <li>Handle Routing.</li>
            <li>Build the Core Request, Translator.</li>
            <li>API for the like section.</li>
            <li>Handle CORS from browser.</li>
          </ul>
        </ul>
        <br>
        <h3>Education</h3>
        <p>University of Science, VNU - HCM  Sep 2019 - Now</p>
        <ul class="container">
          <li>BSc. in Computer Science</li>
          <li>Expecte to graduate in 2023 </li>
        </ul>
        <br>
        <h3>Activities</h3>
        <ul class="container">
          <li>Take part in Winter Volunteer Programs</li>
          <li>A member of Social Work Team - VNUHCM University of Science</li>
          <li>Blood Donation</li>
        </ul>
        <br>
        <h3>Honors & Awards</h3>
        <ul class="container">
          <li>2015</li>
          <ul style="margin-left: 4%">
            <li>Has been awarded A Gold Medal in Casio Mathematics Competition of Quang Nam Province</li>
          </ul>
          <li>2016</li>
          <ul style="margin-left: 4%">
            <li>Has been awarded The Third Prize in Mathematics Competition of Quang Nam Province</li>
            <li>Has been awarded The Consolation Prize in Casio Math Competition of Central Coast</li>
          </ul>
          <li>2017</li>
          <ul style="margin-left: 4%">
            <li>Has been awarded The Consolation Prize in 2017 Hanoi Open Mathematics Competition</li>
            <li>Has been awarded A Bronze Medal in The Competition For Excellent Students Of Major High Schools In The</li>
            <li>Northern Delta And Coastal Areas</li>
          </ul>
          <li>2018</li>
          <ul style="margin-left: 4%">
            <li>Has been awarded A Silver Medal at April 30th Traditional Olympic Competition</li>
            <li>Has been awarded The Second Prize in Mathematics Competition held to select candidates for Vietnam National Mathematics Team</li>
            <li>Has been awarded The Second Place at the American Mathematics Competition 12</li>
          </ul>
          <li>2019</li>
          <ul style="margin-left: 4%">
            <li>Has been awarded The Third Prize in Mathematics Competition held to select candidates for Vietnam National Mathematics Team</li>
          </ul>
         
        </ul>
        <br>
        
      </div>
      <p >
      </p>
      <h1>
        Happy coding! 💻
      </h1>
    </div>
  </section>
</main>

    
@endsection