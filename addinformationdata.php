<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Survey</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type='text/javascript' src='jquery.redirect.min.js'></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

      <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>

      
      <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
      <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
        	getFaculty();
        });

        function closewarningModal()
  	    {
  	        $('#warningmodel').modal('hide');
  	    }

        function getFaculty()
        {
          var dataget;
          var keyword = "null";
          var xaction = "getDept";

          $.ajax({  
              url:"dbprocess.php",
              method:"GET",  
              data:{xaction:xaction, keyword:keyword},  
              success:function(result){  
                 //alert(result)
                 var obj = jQuery.parseJSON(result);
                 if(obj)
                 {
                    //alert(obj);

                    dataget = obj

                    $("#stu_fac").append('<option value="0">Choose faculty...</option>');
                    $.each(dataget, function(key, val) {
                       //$("#searchtypelist").append('<option value="'+val.id+'">'+val.search+'</option>');
                       $("#stu_fac").append('<option value="'+val.id_faculty+'">'+val.name_faculty+'</option>');
                    });
                 }else{
                    alert("Empty");
                 }
              }  
          });
        }

	    
      </script>
      <!--<link rel="stylesheet" type="text/css" href="css/demo.css"/>-->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    </head>
    <body>
      <div class="container-fluid">
      <main>
        <br>
            <h5 class="text-primary"><i class="bi bi-journal-text"></i>&nbsp;&nbsp; แบบสอบถามข้อมูลสุขภาพนักศึกษา:</h5></br>
            <div class="row">
              <div class="col-md-12" id="termDetail">
                <form id="insertForm" method="POST" enctype="multipart/form-data">
                  <div class="row g-3">
                    <div class="col-12">
                      <label for="txtname" class="form-label" style="color:blue;">ชื่อ - นามสกุล : <span class="text-muted">(Optional)</span></label>
                      <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Please input your name." required>
                    </div>

                    <div class="col-sm-4">
                      <label for="stu_fac" class="form-label" style="color:blue;" >คณะที่สังกัด : <span class="text-muted">(Optional)</span></label>
                      <select name="stu_fac" id="stu_fac" nclass="form-select"></select>
                    </div>

                    <div class="col-sm-4">
                      <label for="txtstudentID" class="form-label" style="color:blue;">รหัสนักศึกษา : <span class="text-muted">(Optional)</span></label>
                      <input type="text" class="form-control" id="txtstudentID" name="txtstudentID" placeholder="Please input your student ID." required>
                    </div>

                    <div class="col-sm-4">
                      <label for="txtage" class="form-label" style="color:blue;">อายุ (ปี) : <span class="text-muted">(Optional)</span></label>
                      <input type="text" class="form-control" id="txtage" name="txtage" placeholder="Please input your age." required>
                    </div>

                    <div class="col-sm-6">
                      <label for="txtmoblie1" class="form-label" style="color:blue;">หมายเลขโทรศัพท์เคลื่อนที่ : <span class="text-muted">(Optional)</span></label>
                      <input type="text" class="form-control" id="txtmoblie1" name="txtmoblie1" placeholder="Please input your phone number." required>
                    </div>

                    <div class="col-sm-6">
                      <label for="txtmoblie2" class="form-label" style="color:blue;" >หมายเลขโทรศัพท์ฉุกเฉิน (ผู้ปกครอง/ญาติ) : <span class="text-muted">(Optional)</span></label>
                      <input type="text" class="form-control" id="txtmoblie2" name="txtcoadvisor" placeholder="Please input your parent phone number." >
                    </div>

                    <div class="col-12">
                      <label for="txtmedicine" class="form-label" style="color:blue;">ประวัติการแพ้ยา : <span class="text-muted">(Optional)</span></label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtmedicine" id="medicine1" value="1">
                        <label class="form-check-label" for="medicine1">
                          ไม่มี
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtmedicine" id="medicine2" value="2">
                        <label class="form-check-label" for="medicine2">
                          มี
                        </label>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="txtfood" class="form-label" style="color:blue;">ประวัติการแพ้อาหาร : <span class="text-muted">(Optional)</span></label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtfood" id="food1" value="1">
                        <label class="form-check-label" for="food1">
                          ไม่มี
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtfood" id="food2" value="2">
                        <label class="form-check-label" for="food2">
                          มี
                        </label>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="txtyourmedicine" class="form-label" style="color:blue;">ยาประจำตัว : <span class="text-muted">(Optional)</span></label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtyourmedicine" id="yourmedicine1" value="1">
                        <label class="form-check-label" for="yourmedicine1">
                          ไม่มี
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtyourmedicine" id="yourmedicine2" value="2">
                        <label class="form-check-label" for="yourmedicine2">
                          มี
                        </label>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="txtdiseasetype" class="form-label" style="color:blue;">โรคประจำตัวที่ได้รับการวินิจฉัยจากแพทย์ (การแพ้ยา/อาหาร ไม่นับเป็นโรคประจำตัว) : <span class="text-muted">(Optional)</span></label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtdiseasetype" id="diseasetype1" value="1">
                        <label class="form-check-label" for="diseasetype1">
                          ไม่มี
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtdiseasetype" id="diseasetype2" value="2">
                        <label class="form-check-label" for="diseasetype2">
                          มี
                        </label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="diseasetype" id="diseasetype1" value="1" > โรคหัวใจ<br/>
                        <input type="checkbox" class="form-check-input" name="diseasetype" id="diseasetype2" value="2" > โรคลมชัก<br/>
                        <input type="checkbox" class="form-check-input" name="diseasetype" id="diseasetype3" value="3" > โรคหอบหืด<br/>
                        <input type="checkbox" class="form-check-input" name="diseasetype" id="diseasetype4" value="4" > โรคภูมิแพ้อากาศ<br/>
                        <input type="checkbox" class="form-check-input" name="diseasetype" id="diseasetype5" value="5" > โรคความดันโลหิตสูง<br/>
                        <input type="checkbox" class="form-check-input" name="diseasetype" id="diseasetype6" value="6" > โรคชัก<br/>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="txtfoodtype" class="form-label" style="color:blue;">ประเภทอาหารที่นักศึกษาต้องการรับประทาน : <span class="text-muted">(Optional)</span></label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtfoodtype" id="foodtype1" value="1">
                        <label class="form-check-label" for="foodtype1">
                          ทั่วไป
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtfoodtype" id="foodtype2" value="2">
                        <label class="form-check-label" for="foodtype2">
                          เจ
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtfoodtype" id="foodtype3" value="3">
                        <label class="form-check-label" for="foodtype3">
                          มังสวิรัติ
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtfoodtype" id="foodtype4" value="4">
                        <label class="form-check-label" for="foodtype4">
                          ฮาลาล
                        </label>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <!--<button type="button" class="btn btn-primary" id="btAddterm" onclick="Addtermpaperdata()"><i class="bi bi-save"></i> Save</button>!-->
                      <button type="submit" class="btn btn-primary" id="btAddterm"><i class="bi bi-save"></i> Save</button>&nbsp;&nbsp;<button type="reset" class="btn btn-secondary" id="btClear" onclick="ClearAllData()"><i class="bi bi-x-square"></i> Cancel</button>
                    </div>

                    <span id="output"></span>

                  </div>
                </form>
              <div>
            </div>
          </div>
      </main>

      <!-- Modal Warning -->
      <div class="modal fade" id="warningmodel" tabindex="-1" role="dialog" aria-labelledby="warningmodelTitle" aria-hidden="true">
        <div class="modal-dialog" role="document" style="font-family: 'Noto Sans Thai', sans-serif;">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title text-danger" id="warningmodelTitle"><i class="bi bi-exclamation-triangle-fill text-warning"></i>&nbsp;Warning ! </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closewarningModal()">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="warningDetail"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closewarningModal()">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- End Modal Warning -->
    </body>
  </html>