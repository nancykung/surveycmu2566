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
        	$('#insertForm').change(function(){
        		var selected_value = "";
				selected_value = $("input[name='accept']:checked").val();
				//alert(selected_value);
				if(selected_value == 1){
					saveData1(selected_value);
				}else if (selected_value == 2){
					saveData2(selected_value);
				}
			});
        });

        function closewarningModal()
	    {
	        $('#warningmodel').modal('hide');
	    }

	    function closeacceptModal()
	    {
	    	$('#acceptModel').modal('hide');
	    }

	    function saveData1(inValue)
	    {
            $('#acceptModel').modal('show');
	    }

	    function saveData2(inValue)
	    {
	    	var accept_value = inValue;
	    	var xaction = "saveunaccept";

	    	$.ajax({  
	          url:"dbprocess.php",
	          method:"GET",  
	          data:{xaction:xaction, accept_value:accept_value},  
	          success:function(result){  
	            //alert(result);

	            warningtext = "<h5 class='text-center'>Thank you!</h5>";
	           	$('#warningDetail').html(warningtext);
	            $('#warningmodel').modal('show');
	          }  
	        });
	    }

	    function saveAcceptData3()
	    {
	    	if($("#chkAccept").prop("checked"))
			{
				//alert('Is checked');
				$('#acceptModel').modal('hide');
				self.location.href="addinformationdata.php";
			}
			else
			{
				alert('กรุณาเลือกยินยอม');
				$("#chkAccept").focus();
			}
	    }
      </script>
      <!--<link rel="stylesheet" type="text/css" href="css/demo.css"/>-->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    </head>
    <body>
      <main>
        <div class="container-fluid">
            <div class="row" style="font-family: 'Noto Sans Thai', sans-serif;">
              <div class="col-lg-12">
              	<p>
	                <h3 class="display-5 fw-bold lh-1 mb-3 text-primary">แบบสำรวจจำนวนนักศึกษาที่ต้องการเข้าร่วม
	โครงการประเพณีนำนักศึกษาใหม่เดินขึ้นไปสักการะพระธาตุดอยสุเทพ ปี 2566</h3>
	                <form id="insertForm" method="POST">
	                	<div class="form-check">
						  <input class="form-check-input" type="radio" name="accept" id="accept1" value="1">
						  <label class="form-check-label" for="accept1">
						    ประสงค์เข้าร่วม
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="accept" id="accept2" value="2">
						  <label class="form-check-label" for="accept2">
						    ไม่ประสงค์เข้าร่วม
						  </label>
						</div>
	                </form>
            	</p>
              </div>
            </div>
        </div><!--container!-->
      </main>

      <!-- Modal Accept -->
      <div class="modal fade" id="acceptModel" tabindex="-1" role="dialog" aria-labelledby="uploadfilemodel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="font-family: 'Noto Sans Thai', sans-serif;">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h5 class="modal-title" id="acceptInformModel"><i class="bi bi-bookmark-plus"></i>&nbsp;ขอความยินยอม : </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeacceptModal()">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="uploadDetail">
              <form id="aceeptForm" method="POST">
                <div class="col-12">
                  <p>แบบสอบถามฉบับนี้มีวัตถุประสงค์เพื่อใช้ในการคัดกรองสุขภาพเบื้องต้น สำหรับประกอบการ
ดูแลนักศึกษาที่เข้าร่วมกิจกรรมฯ และวางแผนเตรียมพร้อมในการปฏิบัติงานของมหาวิทยาลัยเชียงใหม่ใน
การจัดกิจกรรมประเพณีรับน้องขึ้นดอย ปี 2566<br>
ซึ่งการเก็บข้อมูลมีความจำเป็นต้องเข้าถึงข้อมูลส่วนบุคคล
เพื่อตรวจสอบความถูกต้องและส่งต่อไปยังศูนย์สุขภาพ มช. (คลินิกไผ่ล้อม) เพื่อรับการตรวจคัดกรอง
สุขภาพโดยละเอียด และผู้จัดกิจกรรมของคณะที่นักศึกษาสังกัด
จึงขอความกรุณานักศึกษาคัดกรองสุขภาพด้วยความเป็นจริงสำหรับการนำเสนอข้อมูล
สุขภาพจะถูกนำเสนอในภาพรวมเท่านั้น<br>
ข้อมูลที่เกี่ยวข้องกับนักศึกษาจะถูกเก็บเป็นความลับและข้อมูลใดที่สามารถระบุถึงตัวนักศึกษาจะ
ไม่ปรากฎในฐานข้อมูลสาธารณะ ทั้งนี้
หากนักศึกษาไม่ยินยอมให้เปิดเผยข้อมูลทางสถิติของตนเองในภายหลัง
สามารถติดต่อขอยกเลิกการอนุญาตให้ใช้ข้อมูลได้ที่ กองพัฒนานักศึกษา สำนักงานมหาวิทยาลัย
อีเมล............................ หรือติดต่อสอบถามได้ที่หมายเลขโทรศัพท์.....................
การให้ข้อมูลสุขภาพส่วนบุคคลจะเป็น
ประโยชน์อย่างยิ่งในการดูแลนักศึกษาตลอดการเข้าร่วมกิจกรรมฯ ในครั้งนี้<br>
* หมายเหตุ กรณีที่นักศึกษามีความเสี่ยงด้านสุขภาพ แล้วมีการแจ้งข้อมูลไม่ครบถ้วน หรือปกปิดข้อมูล
อาจส่งผลต่อการให้การดูแลช่วยเหลือจากทีมแพทย์และพยาบาลที่อาจล่าช้า หากเกิดเหตุสุดวิสัย
ให้อยู่ในความรับผิดชอบของนักศึกษา
                  </p>&nbsp;&nbsp;
                  <div class="form-check">
					  <input class="form-check-input" type="checkbox" value="" id="chkAccept">
					  <label class="form-check-label" for="chkAccept">
					    [ ] ยินยอม <span style="color:red; font-size:14px">(บังคับตอบ)</span>
					  </label>
				  </div>
                  
                </br><button type="button" class="btn btn-primary" id="btAccept" onclick="saveAcceptData3()">ยินยอม</button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeacceptModal()">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- End Accept Modal -->

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