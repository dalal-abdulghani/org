@extends('layouts.main')

@section('head')

@section('title', $settings['site_name'] . ' - من نحن')

<style>
    .content::before {
        content: '';
        display: block;
        width: 5vw;
        height: 5vw;
        max-width: 30px;
        max-height: 30px;
        background-image: url('{{ asset('images/لقطة_الشاشة_2024-10-08_205423-removebg-preview.png') }}');
        background-size: contain;
        background-repeat: no-repeat;
        position: relative;
        margin: 0 auto 10px auto;
    }

    .section {
    background-image: url('{{ asset('images/لقطة الشاشة 2024-10-08 204001.png') }}'), linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    padding: 20px;
    /* height: 400px; */
}
    </style>

@endsection

@section('content')

<div class="background" style="margin-top: 100px">
    <div class="about">
        <p>
            مؤسسة رواسخ للتنمية الإنسانية هي منظمة غير ربحية تسعى إلى تحسين حياة الأفراد والمجتمعات من خلال تنفيذ برامج تنموية شاملة ومستدامة. تأسست المؤسسة بهدف تقديم الدعم والمساعدة للمحتاجين في مختلف المجالات، بما في ذلك التعليم، الصحة، التمكين الاقتصادي، والرعاية الاجتماعية.
        </p>
        <img src="{{ asset('images/لقطة_شاشة_2024-10-06_225300-removebg-preview.png') }}" alt="Logo or Image" width="300px" height="300px">
    </div>
</div>









  <div class="section">

    <div class="container">
      <div class="line-text-1 my-5">
        الرؤية والرسالة
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-12 col-lg-4 Box m-3">
          <h1 class="title">رؤية رواسخ</h1>
          <p class="message">
            أن نكون    نموذجاً رائداً في تحقيق التنمية المستدامة، والمساهمة الفعالة في بناء مجتمعات مزدهرة من خلال تمكين الأفراد وتوفير فرص عادلة للجميع لتحسين جودة حياتهم.
          </p>
        </div>
        <div class="col-12 col-lg-4 Box">
          <h1 class="title">رسالــة رواسخ</h1>
          <p class="message">
            نسعى      إلى تعزيز القدرات الإنسانية وتمكين المجتمعات من خلال تقديم برامج تنموية مبتكرة وشاملة.
          </p>
        </div>
      </div>

    </div>





  </div>





  <div class="section2">

    <div class="container">
      <div class="line-text-1 my-5">
        الأهداف
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-6 col-lg-4     text-center py-5">
          <h2 class="content">إنشاء</h2>
          <p>منصة رقمية تفاعلية وشاملة تركّز على تجربة المستخدم</p>
        </div>
        <div class="col-6 col-lg-4    text-center py-5">
          <h2 class="content">اعتمـــاد
          </h2>
          <p>استخدام المنصة الرقمية من قبل المتبرّعين وجهات جمع التبرّعات من خلال التسويق.</p>
        </div>
        <div class="col-6 col-lg-4   text-center py-5 ">
          <h2 class="content">تنسيـــق</h2>
          <p>التوافق بين أصحاب المصلحة في القطاع الخيري المحلي بشأن الأدوار والمسؤوليات.</p>
        </div>
        <div class="col-6 col-lg-4    text-center py-5">
          <h2 class="content">تعزيــــز</h2>
          <p>الحملات التسويقية التي تستهدف مشاركين جدد في الأنشطة الخيرية.</p>
        </div>
        <div class="col-6 col-lg-4  text-center py-5 ">
          <h2 class="content">تمكيــن</h2>
          <p>فرص التطوّع ودفع المستخدمين إلى <br>المشاركة في الأنشطة الخيرية عبر المنصة.</p>
        </div>
        <div class="col-6 col-lg-4  text-center py-5 ">
          <h2 class="content">تقديــم</h2>
          <p>الإرشـــادات إلـــى جهــات جمـــــــع التبرّعات من أجل تعزيز العمليات وتسريع التبني الرقمي</p>
        </div>
        <div class="col-6 col-lg-4   text-center py-5">
          <h2 class="content">إعــداد</h2>
          <p> قاعـدة بيانـــات خاصـــة بقطـــاع التبرّعـات وإعـــداد أبحاث تحتوي معلومات قائمة على البيانات</p>

        </div>
        <div class="col-6 col-lg-4   text-center py-5">
          <h2 class="content">تحسيـن</h2>
          <p>أداء وترتيــب المملكــة العربيـــة السعودية في المؤشرات العالمية الخاصة بالعطاء الخيري.</p>

        </div>
        <div class="col-6 col-lg-4  text-center py-5 ">
          <h2 class="content" >ضمــان</h2>
          <p>الشفافية ورفع تقارير عن أنشطة المنصة الرقمية</p>
        </div>
        <div class="col-6 col-lg-4   text-center py-5">

          <h2 class="content">توظيــف</h2>
          <p>القدرات الرقمية والذكاء الاصطناعي علــى المستـــوى الداخلـــي وإبـــرام الشراكات المحلية والدولية اللازمة.
          </p>
        </div>
      </div>

    </div>





  </div>





  <div class="section">

    <div class="container">
      <div class="line-text-1 my-5">
        الركائز
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-12 col-lg-3   py-4 Box">
          <h4>الركيزة الأولى</h4>
          <p>تسهيل رحلة التبرّع الرقمية</p>

        </div>
        <div class="col-12 col-lg-3    py-4 Box">
          <h3>الركيزة الثانية</h3>

          <p>تشجيع المشاركة المجتمعية</p>
        </div>
        <div class="col-12 col-lg-3  py-4 Box">
          <h3>الركيزة الثالثة</h3>

          <p>تسريع عملية تطوير الممكّنات</p>
        </div>
      </div>

    </div>





  </div>







  <div class="section3">

    <div class="container">
      <div class="line-text-1 my-5">
        مجالات التبرع
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">


        <div class=" col-sm-12  col-2 col-lg-3  py-4 Box2 text-center">
          <img src="{{ asset('images/icon-3.svg') }}" alt="Description" class="img-fluid" style="width: 50px; height: 50px; margin-bottom: 30px; ">
          <p class="mt-2">صحي</p>



        </div>

        <div class="col-sm-12 col-2 col-lg-3  py-4 Box2 text-center">
          <img src="{{ asset('images/icon-2.svg') }}" alt="Description" class="img-fluid" style="width: 50px; height: 50px; margin-bottom: 30px; ">
          <p class="mt-2">اجتماعي</p>

        </div>

        <div class=" col-sm-12 col-2 col-lg-3  py-4 Box2 text-center">
          <img src="{{ asset('images/icon-1.svg') }}" alt="Description" class="img-fluid" style="width: 50px; height: 50px; margin-bottom: 30px; ">
          <p class="mt-2">تعليمي</p>

        </div>

        <div class="col-sm-12 col-2 col-lg-3  py-4 Box2 text-center">
          <img src="{{ asset('images/mosque.svg') }}" alt="Description" class="img-fluid" style="width: 50px; height: 50px; margin-bottom: 30px; ">
          <p class="mt-2">ديني</p>

        </div>

        <div class="col-sm-12 col-2 col-lg-3  py-4 Box2 text-center">
          <img src="{{ asset('images/veg.svg') }}" alt="Description" class="img-fluid" style="width: 50px; height: 50px; margin-bottom: 30px; ">
          <p class="mt-2">غذائي</p>

        </div>






        <div class="col-sm-12 col-2 col-lg-3  py-4 Box2 text-center">
          <img src="{{ asset('images/house.svg') }}" alt="Description" class="img-fluid" style="width: 50px; height: 50px; margin-bottom: 30px; ">
          <p class="mt-2">سكني</p>

        </div>


      </div>

    </div>

  </div>



@endsection
