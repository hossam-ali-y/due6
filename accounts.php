<?php
header('Access-Control-Allow-Origin: *' );
      header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
      header('Access-Control-Max-Age: 1000');
?>
<!--start custom_section -->
<!--start customer table-title -->
     <div class="table-title">
                <div class="row" style="">
					  <b id="title-c" style="font-size: 20px;">	
			  
						الحســــــــابات</b>
						 <span id="mssg-c" style="color:#fff937;font-size:20px;"></span>
					<div class="col-sm-6" style="    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;position: inherit;">
				<div>
					<button id="addcustom" data-cont="" data-op="dash"style="font-size:16px; font-weight: 600;padding: 3px 5px 0px;margin-left: 5px; background-color :#e6e6e6;
	color: #777;" class="btn btn-success" ><img id='addcimg' src='images/icons/my_status_add.png' style='opacity:1;;margin-right:-5px;margin-left:8px;' height='25px'>حساب جديد</button>
					</div>
						<div>
						
					<form  id="formUpload-c" enctype="multipart/form-data" style="display:none" >	
					     <input  id="c_clear" type="button" class="btn btn-success" style="font-size:16px; font-weight: 600;padding: 2px 19px 0px;"   data-dismiss="modal" value="تهيئة" onclick="$('#c_reset').click(); ">
	
					<a href="#conf-c" id="confadd-c" data-toggle="modal" style="display:none">
					<button id="" class="btn btn-info" style="font-size:16px;font-weight: 600;padding: 2px 19px 0px;" value="save" >حفظ</button></a>	
					
	   
			         <img src="images/electronics-img.png" width="40px" title="إضافة صور" style="cursor:pointer;    " onclick="$('#c_file').click();"  >
			 		 <span  style="vertical-align: text-top;" id="selectedimg-c"></span>
					 <input type="file" id="c_file" name="c_file[]" multiple="multiple" style="display:none" accept="image/*" browse="gallery"  >
					 
			  <input type="submit" id="c_upload" name="c_upload" value="رفع" hidden>
				</form>

			
				
	
			
							<button id="list-c" data-active="1" class="btn btn-success" style="    text-align:center;	margin-left:0px;background-color:white;color: #4c4c4c;border-top-right-radius: 4px;border-bottom-right-radius: 4px;padding:0px 15px 0px 25px;">
						    <img src="images/icon_list.png" width="13px"> 
						   </button>	
							
							<button id="grade-c" data-active="0" class="btn btn-success" style=" margin-right: -2px;text-align:center;margin-left:0px;padding:0px 15px 0px 25px;
							color:#4c4c4c;border-top-left-radius:4px; background-color :#e6e6e6; border-bottom-left-radius: 4px;" >
						    <img src="images/icon_grid.png" width="13px"> 
						   </button>	
						
						<button id="del-c" class="btn btn-del" style="font-size:16px;font-weight:600;text-align:center;margin-right:0px;background-color :rgba(255, 255, 255, 0);color: #777;margin-right:5px;padding:0px 0px 0px 6px;">
						<img src="images/icons/ic_settings_delete.png" style="width:22px; height:22px;">حذف </button>	
	           		
					<a href="index.php" id="refresh-c" class="btn-lg " style="text-align:center;margin-right:5px" ><img src="images/ic_settings_reset.png" height="28px"></a>
  
	     </div>
		   </div>
			
			
                </div>
       </div>
	   
<!--end customer table-title -->
<!--end  customer table-containt-->
       <div class="containt" id="containt-c" >
            <table id="table-hover-c" class="table table-striped table-hover" style="border-collapse:collapse; width:100%"  >
                <thead id="tbl_head-c">
                    <tr >
						<th>
							<span class="custom-checkbox"  style="position: inherit;">
	                            <input id="c_selectAll" type="checkbox">
								<label for="c_selectAll"></label>
							</span>
						</th>
						<th style="min-width:10px">الرقم </th>
						<th style="min-width:160px"> العميل</th>
                        <th style="min-width:100px">إجمالي_الحساب</th>
						<th >النوع</th>
						<th style="min-width:200px;text-align:justify">الملاحظة</th>	
                       <th style="min-width:160px">التاريخ</th>
					    <th>المسجل</th>
						 <th>حذف</th>
                    </tr>
                </thead>
                <tbody id="tbl_body-c">
	
                </tbody>			
		  </table>
		  
<div  id="addmodal-c" class="" style="display:none; "   >
					<form  class = "w3-container" role ="form" style="margin-top:0px">
					<input  id="c_reset" class="btn btn-success" style="font-size:16px; font-weight: 600;"   data-dismiss="modal" value="تراجع" type="reset" hidden>
				<div id="mobile-content-c" class="modal-content" style="  
   flex-direction: row;
    flex-wrap: wrap;
	    justify-content: center;
     align-content: stretch;border: none;    box-shadow: none;">

		<div id="mobile-form-c" style="padding:8px 2px 2px 2px;border:">
				
				<input class="form-control" id="c_id"  type="hidden" name="c_id" >
				اسم الحساب<input id="c_name" data-id="" class = "form-control"  type="text" name="c_name" > 
       <ul id="suggestion-c">
	   <li id="new_custom-c" class="custom_item" style="background-color:#eee" > حساب جديد<hr></li>
	  
       </ul>
			 قيمة الفاتورة (ريال)<input id="c_amount" class = "form-control" DIR="rtl" type="text" name="c_amount" >
			 
	<div style="display:flex">
	<div style="margin-left:50px;width:120px">
					نوع الفاتورة <select id="c_type" class = "form-control" style="  height: 40px; padding-top: 6px;" name="c_type"><option>دين (اجل)</option><option>دفع (مسلم)</option></select> 
</div>              
<div style="width:120px">
			 حالة الفاتورة <select id="c_status" class = "form-control" style="  height: 40px;padding-top: 6px;" name="c_status"><option>مفتوحة</option><option>مدفوعة</option> <option>مسودة</option></select>
</div>
	</div>
	
				ملاحظة<textarea id="c_note" class = "form-control"  type="text" name="c_note" rows="2" required> </textarea>	
				التاريخ<input id="c_crate_date" class = "form-control"  DIR="rtl" type="text" name="c_crate_date"  >
				 اخرى<input class = "form-control"  DIR="rtl" type="text" name="c_another"  >
				  الاعتمادات<input  class = "form-control"  DIR="rtl" type="text" name="c_"  >
			 					
</div>	
   </div>      
</form>
</div>

			
<div id="conf-c" class="modal fade" style="display: none;">
      <div class="modal-dialog"><div class="modal-content"><div class="modal-header" style="padding:15px 12px 13px 15px">						<h4  id="title-dialog-c"class="modal-title" style=" margin: 0px 25px 0px 0px;">إضافة فاتورة</h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button></div><div class="modal-body" >					<p id="info-dialog-c">هل انت متأكد من إضافة الحساب الجديد؟</p><p class="text-warning"><small>تأكيد للإستمرار أو تراجع لعدم الحفظ</small></p></div><div class="modal-footer" style="padding:15px 30px">	<button id="add-c"  class="btn btn-info" type="button"  data-dismiss="modal" aria-hidden="true" title="save new project" name="save" style="display:inline-block"   >تأكيد</button>	<button id="edit-c"  style="display:none" class="btn btn-info" type="button"  data-dismiss="modal" aria-hidden="true" title="" name="edit"    >تأكيد </button><input class="btn btn-default"  name="cancel" data-dismiss="modal"		title="إغلاق النافذة" value="تراجع" type="button"  style="display:inline-block;color:#333;background-color:#fff;border-color:#4c4c4c"></div></div></div>
</div> 
				
<div id="delete-c" class="modal fade" style="display: none;"><div class="modal-dialog">
    <div class="modal-content"><div class="modal-header" style="padding:15px 12px 13px 15px"><h4 class="modal-title" style="    margin-right: 8px;">حذف الحساب</h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button></div><div class="modal-body" style="padding-bottom: 2px;
    padding-top: 15px;"><p id="deletinfo-c">?</p><p class="text-warning"><small> حذف للتأكيد او إلغاء لعدم الحذف</small></p></div><div class="modal-footer" style="padding:15px 30px"><input   name="u_name" value="'+v_name+'" type="hidden">
   <input   name="u_id" value="'+id+'" type="hidden"><input class="btn btn-danger" id="c_delete"  name="c_delete" value="حذف" type="submit" style="display:inline-block"><input class="btn btn-default" name="cancel" data-dismiss="modal" value="إلغاء" type="button"style="display:inline-block;color:#333;background-color:#fff;border-color:#4c4c4c"></div></div></div>
</div>	
		  
<div id="grid-c" class="flex_container" style="display: none;">


</div> 
						
</div>
<!--end customer table-containt -->


<script type="text/javascript">
	
//list & grade on mouseover
//////////////////////////////////////////////////
$('#list-c').on({
'mouseover':function(){
	
	$('#list-c').css('border-left-color','#8c8c8c');
},
'mouseleave':function(){
	
	$('#list-c').css('border-left-color','#aba4a46b');
}
});
$('#grade-c').on({
'mouseover':function(){
	
	$('#list-c').css('border-left-color','#8c8c8c');
},
'mouseleave':function(){
	
	$('#list-c').css('border-left-color','#aba4a46b');
}
});
////////////////////////////////////////////////

var customers;
var allimages_c;
var msg_c='';
var op_c='dash';
var files_c=0;
var ref_duration_c=10000;
var c_initial_btn=0;
var c_start=1;

////////////////suggestions///////////////////////////////////
	$('#suggestion-c').hide();
	$("#c_name").on('click',function(){
			$('#suggestion-c').fadeIn(5000);
	});
	$("#c_name").on('focusout',function(){
		$('#suggestion-c').fadeOut("5000");
	});
	$("#c_name").on('focus',function(){
		//$('#suggestion').slideDown("slow");
		$('#suggestion-c').fadeIn("5000");
		if($(this).val()!=""){
		$("#c_name").keyup();
		console.log(keyup);
		}
	});
$("#c_name").on('keyup',function(){
	           var name;var patt;var res;
			   
	           var search=$(this).val();
	$('#suggestion-c').html(' <li id="new_custom-c" class="custom_item" style="background-color:#eee" > حساب جديد<hr></li>');
	if(search!="" && search!=null){
		var list_item=[];
		       for(i=0;i<customers.length;i++){
				  name=customers[i][1];
				  //patt="/search/";
                  //res=patt.search(name);
         //search method searches string for specified value and method return position of match value else return -1
				  res=name.search(search);
				   //console.log(res);
				  if(res!=-1){
					 var item=[];
					  item[0]=customers[i][0];
					  item[1]=name;
					//  console.log(customers[i][0]);
					  list_item.push(item);
				  }
               }
			   console.log(list_item);
			    var list_sort=list_item;
			 //  var list_sort=list_item[0].sort();
			   console.log(list_sort);
			       for(i=0;i<list_sort.length;i++){
			         	   $('#suggestion-c').append('<li id="custom-c'+list_sort[i][0]+'" data-id="'+list_sort[i][0]+'"  data-name="'+list_sort[i][1]+'" class="custom_item" >'+list_sort[i][1]+'<hr class="hr"></li>');
	                  	//hover the same of use mouseover
                      $('#custom-c'+list_sort[i][0]+'').hover(function(){
					     var id=$(this).attr('data-id');
					     var name=$(this).attr('data-name');
	                  	$("#c_name").val(name);
						 $("#c_name").attr('data-id',id);
                      });
				   }
			   }
			   else{
				   get_all_customers();
			   }
	});
//////////////////upload images////////////////////////////////
	$('#c_file').on('change',function(e){
		files=e.target.files.length;
		console.log(e);
		  $("#selectedimg-c").css("color","#b9b408").css("font-size","18px");
    $("#selectedimg-c").html(files+" صورة محددة");
	});
$('#formUpload-c').on('submit',function(e){
	e.preventDefault();
		   var formData=new FormData(this);
//console.log(formData);
	$.ajax({
		type:'POST',
		url: 'webservices/upload.php',
		data:formData,
		contentType: false,
		processData: false,
		success: function (data) {
			data=JSON.parse(data);
			if (data.images) {
				//console.log(data.images);
				//add_invo(data.images);
				
			} else {
				alert('خطاء في رفع الملف الخاص بك');
			}
			console.log(data);
			//data=JSON.parse(data);
		},
		error: function (data) {
			alert('خطاء في رفع الملف الخاص بك');
		}
});			
});
	  
////////////////////////////////////////////////////////////////////////////
function custom_list_style(){
		if($('#list-c').attr('data-active')==0){
			     $('#list-c').css('background-color','white'); 
			     $('#grade-c').css('background-color','#e6e6e6');	
				 $('#grid-c').hide();		
                 $('#list-c').attr('data-active',"1");
		     	 $('#grade-c').attr('data-active',"0");			  
		  }
  }
////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
///////////////////////////////////here
////////////////////////////////////////////////////////////////////////
//back from add_item to browse_items in table style or grid style
function custom_back(){
	$('#refresh').show();
	$('#confadd').hide()
	$('#formUpload').hide();
	//$('.table-title').css('border-bottom','1px solid #a8a8a8');
      // $('#table-hover-c').show();
	//  $('#tbl_head-c').show();
	 // $('#tbl_body-c').show();
	   	 $('#groping').show();
	//  $('#containt').css("height","70%");
		$('#addmodal').hide(); 
		$('#del').show();
		
		$('#grade').show();
		$('#list').show();
		$('#list').addClass('back-btn');
		$('#grade').addClass('back-btn');
		//$('#grid-c').hide();

			//$('#del').addClass('back-btn');
	
	 	 /////show footer button
		$('#title').html(" الـفواتيــــــــر   "+msg_c);
			$('#addcustom').addClass('back-btn');
	
			//$('#addcustom').addClass('addproject');
			$('#del').addClass('addproject');
			$('#addcustom').html("<img id='addpimg' src='images/icons/my_status_add.png' style='opacity:1;margin-right:-5px;margin-left:3px;' height='25px'>فاتورة جديدة");
$('#addcustom').on('mouseover',function(){
	$('#addpimg').css("opacity","2");

});
$('#addcustom').on('mouseleave',function(){
	//$('#addpimg').css("height","35px");
		$('#addcustom').css("color","rgb(119, 119, 119)").css("background-color", "transparent");
			$('#addpimg').css("opacity","1");
});
				$('#addcustom').attr('data-cont',$('#containt').html());				
				//$('#addcustom').attr('data-op','dash');
				op_c='dash';
}

function goto_edit_c(row){
	op_c="dash";
				P={lat:row.attr('data-lat'),lng:row.attr('data-lng')};
		
				getall_invo();
				var id=row.attr('data-id');
			
				var status=row.attr('data-status');
				
					 var status;
					 var lat=row.attr('data-lat');
					 var lng=row.attr('data-lng');
		  $("#pid").val(id);
	   $("#custom_name").val(row.attr('data-name'));
	   $("#pinfo").val(row.attr('data-info'));
	 //  $("#pcategory").val(row.attr('data-category'));
	   $("#invo_amout").val(row.attr('data-start_date'));
		$("#pfinish_date").val(row.attr('data-finish_date'));
		$("#plat").val(row.attr('data-category'));
		$("#plng").val(lng);
		   $("#invo_amout").val(lat);
		   $("#p_lng").text(lng);

	$('#title').html(" <i class='glyphicon glyphicon-edit'  data-toggle='tooltip' title='' data-original-title='تعديل'></i> تعديل الفاتورة رقم "+id+" ");
			$('#addcustom').html("رجوع");
			$('#addcustom').addClass('back-btn');
				$('#addcustom').attr('data-cont',$('#containt').html());	
				
				$('#title-dialog').html(" تعديل فاتورة ");
				$('#info-dialog').html("هل انت متأكد من تعديل الفاتورة؟");
				$('#save').html(" تعديل ");
				$('#add').hide();
				$('#edit-c').css("display","inline-block");

				$('#edit-c').on('click',update);
				//$('#edit-ce').html(" حفظ التغيرات ");
}

function getall_invo(){
$('#mssg').html('');		
 $("#title").show();
$("#c_selectAll").prop("checked", false);
//console.log(op_c);
		switch(op_c){
			case 'dash':
			
			 clearInterval(auto_refresh);
			
			         op_c='add';
			$('#addcustom').attr('data-cont',$('#containt').html());
	$('#table-hover-c').hide();
	//$('#tbl_head-c').hide();
	//$('#tbl_body-c').hide();
	   $('#groping').hide();
	      $('#containt').css("height","88%");
   $('#addmodal').css('display','block');
  /* $('#addmodal').html('			<div id="mobile-content" class="modal-content" style="border-radius: 22px;"><div id="mobile-form" style="padding:2px 2px;border:"><div class="modal-body" style="width:-webkit-fill-available;padding:2% 3% 5px 3%"><input class="form-control" id="pid"  type="hidden" name="pid" ><br>اسم الحساب<input id="custom_name" data-id="" class = "form-control"  type="text" name="custom_name" > <ul id="suggestion"><li id="new_custom" class="custom_item"  > حساب جديد<hr></li></ul>قيمة الفاتورة (ريال)<input id="invo_amout" class = "form-control" DIR="rtl" type="text" name="invo_amout" ><div style="display:flex"><div style="margin-left:50px;width:120px">نوع الفاتورة <select id="pcategory" class = "form-control" style="    height: 40px;padding-top: 6px;" name="invo_type"><option>دين (اجل)</option><option>دفع (مسلم)</option></select> </div>              <div style="width:120px">حالة الفاتورة <select id="invo_status" class = "form-control" style="    height: 40px;padding-top: 6px;" name="invo_status"><option>مفتوحة</option><option>مدفوعة</option> <option>مسودة</option></select></div></div>ملاحظة<textarea id="plng" class = "form-control"  type="text" name="pfinish_date" rows="2" required> </textarea>	  التاريخ<input id="pinfo" class = "form-control"  DIR="rtl" type="text" name="pinfo"  >اخرى<input class = "form-control"  DIR="rtl" type="text" name="pinfo"  >الاعتمادات<input  class = "form-control"  DIR="rtl" type="text" name="pinfo"  ></div>  					</div>	</div> ');
*/
            $('#reset').click();
		$('#confadd').show();
		$('#formUpload').css('display','initial');
		$('.table-title').css('border-bottom','0px solid #a8a8a8');
		$('#refresh').hide();
		
	//	 console.log(content);
	$('#title').html(" <i class='glyphicon glyphicon-add'  data-toggle='tooltip' title='' data-original-title='إضافة فاتورة جديدة'></i> فاتورة جديدة");
		$('#title-dialog').html(" إضافة فاتورة ");
				$('#info-dialog').html("هل انت متأكد من إضافة الفاتورة؟");
				$('#save').html(" إضافة ");
		$('#addcustom').html("رجوع");

			$('#addcustom').addClass('back-btn');
	
			$('#addcustom').css("padding","0px 19px 0px")
		$('#del').hide();
		$('#save').html("حفظ");
		$('#edit-c').hide();
				$('#add').show();
			$('#invo_amount').focus();
			
			//$('#addcustom').attr('data-op','add');   
	    $('#grid-c').hide();
	$('#grade').hide();
		$('#list').hide(); 
		if(start==1){
	
           $('#add').on('click',function(){
			    //if need to upload with images
				//$('#upload').submit();
					   console.log("addinvo");
			     add_invo();
		   });
		  start=0;
		}
          break;
		  
	case 'add':
 auto_refresh=setInterval(refresh,ref_duration_c);
          refresh();
		  $('#addcustom').removeClass('back-btn');
		   $('#addcustom').css('padding','3px 5px 0px');
	      $('#containt').css("height","79%");
		  $('.table-title').css('border-bottom','1px solid #a8a8a8');
		  initial(c_initial_btn);
		  for(i=0;i<invoices;i++){
			   pro_grade[i]=invoices[i][0];
		  }	
		   // console.log("addinvo");
			break;
		}
		}	
$('#addcustom').click(getall_invo);

function add_invo(){
		 var pro={};var status;
		// console.log("ijjn");
	    id=$("#v_pid").val();
	    pro.name=$("#custom_name").attr('data-id');
		console.log($("#custom_name").attr('data-id'));
	    pro.info=$("#pinfo").val();
	    pro.category=1;//$("#pcategory").val();
		pro.start_date=$("#invo_amout").val();
		pro.user_id=1;//$("#pfinish_date").val();
		pro.lat=1;//$("#plat").val();
		pro.lng=$("#plng").val();
	   pro.fun='insert';
	   
		$.post('functions.php',pro,function(rt,ts,xhr)
		{	
	      var jes=JSON.parse(rt);
		  //	console.log(jes);
			var msg_c=jes[1];
		     invoices=jes[0];
		  if(msg_c===true){  //if insert execute successfully 
	 		  // $('#tbl_head-c').show();
			   create_listbutton();
			    auto_refresh=setInterval(refresh,ref_duration_c);
				   $("#mssg").css("color","rgb(16, 196, 105)");
				   $("#mssg").html("✔  تمت الإضافة ◀ ");	
				   	// $('#containt').css("height","72%");
	$('#addcustom').css('padding','3px 5px 0px');
	   //   $('#containt').css("height","78%");
	   $('#reset').click();
		  } 
		  else {//if insert not execute  	
			   $("#mssg").html("❌ لم تتم الإضافة  ◀ "+msg_c).css("color","#e65651");
		  }
		  
	    });	
}

function deletecustom(id){

	var delet={};
	delet.fun='del';
	delet.pid=id;
		//console.log(delet.pid);
	$.post('functions.php',delet,function(result,ts,xhr)
		{	
			if(ts=="error"){
				  $("#mssg").html("لم يتم الحذف").css("color","#e65651");
			}
			else{
			//	console.log(result);
	      var json=JSON.parse(result);
		     invoices=json[0];
		  if(json[1]>0){  //if insert execute successfully 
	 		   //$('#tbl_head-c').show();
			    create_listbutton();
			   		$("#mssg").css("color","rgb(16, 196, 105)").css("font-size","20px");
//$("#title").hide();
				   $("#mssg").html("تم حذف الفاتورة رقم : "+json[1]);
$('#addcustom').css('padding','3px 5px 0px');
	 /////show footer button
	 $('#groping').show();
	 // $('#containt').css("height","70%");	

		  } 
		  else if(json[1]==0){//if insert not execute  	
			   $("#mssg").html("لم يتم الحذف").css("color","#e65651").css("font-size","20px");

		  }	
			}
	    });	
}

 function update(){	 	
	    id=$("#pid").val();
	    name=$("#custom_name").val();
	   info=$("#pinfo").val();
	    category=$("#pcategory").val();
		start_date=$("#invo_amout").val();
		finish_date=$("#pfinish_date").val();
		lat=$("#plat").val();
		lng=$("#plng").val();
		img=$("#pimg").val();
	if($("#pconfirmed").prop('checked')==true){ status=1;}else{ status=0;}
	   status=status;
	
	  
	 var xmlhttp;
	 if(window.XMLHttpRequest)
		 xmlhttp=new XMLHttpRequest();
	 else
	xmlhttp=new ActiveXobject("Microsoft.XMLHTTP");	 

xmlhttp.onreadystatechange=function(status){
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			//	console.log(JSON.parse(xmlhttp.responseText));
			var jeson=JSON.parse(xmlhttp.responseText);
	
//         $("#mssg").text("تم التعديل بنجاح");
				  invoices=jeson[0];
	 		  //$('#tbl_head-c').show();
			   create_listbutton();
			   
				   $("#mssg").css("color","rgb(16, 196, 105)");
				   $("#mssg").html("تم التعديل بنجاح");	
				   $('#addcustom').css('padding','3px 5px 0px');
				    // $('#containt').css("height","78%");
	}
	else {	
			   $("#mssg").html("لم يتم التعديل").css("color","#e65651");
		  }
}	
xmlhttp.open("POST","functions.php",true);
xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
xmlhttp.send('pid='+id+'&name='+name+'&info='+info+'&category='+category+'&start_date='+start_date+'&finish_date='+finish_date+'&lat='+lat+'&lng='+lng+'&confirmed='+status+'&fun=update');
 }
 

	 $("[data-toggle='tooltip']").tooltip();
	$("#c_selectAll").click(function(){
			var checkbox = $('table tbody#tbl_body-c input[type="checkbox"]');
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
		
		checkbox.click(function(){
			if(this.checked){
				var countcheck=0;
				
				checkbox.each(function(){
				if(this.checked==true)  
					countcheck++;
			});
			
		    checkbox.checked;
				if(countcheck==10)
					$("#c_selectAll").prop("checked", true);
		 }
		if(!this.checked){
		
	
	$("#c_selectAll").prop("checked", false);
		}
	});	
	});
</script>
