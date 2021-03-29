<?php
   @session_start();
   	require_once"functions.php";
	  require_once"nav.php";
  require_once'modal.php';

?>

<!DOCTYPE html>
<html dir="rtl" >
<head>
<title> الفواتير <<نظام الحسابات&الفواتير</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!--script src="ajax_fun.js"></script-->
   


	  	<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
  	  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap/css/icon.css">

	<link rel="stylesheet" href="css/my.css">
   <link rel="stylesheet" href="css/style.css" type="text/css">
	
<link rel="stylesheet" href="css/slider.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">


	<link rel="stylesheet" href="css/custom.css" type="text/css">
		  
<style type="text/css">


</style>

<script type="text/javascript">

$(document).ready(function(){	

	// Activate tooltip
	$('#home').attr("href","index.php");
	$('#home1').attr("href","index.php");
	$("#editEmployeeModal").hide();
	$('#research-ico').attr('src','images/search-icon.png')	
	$("#mssg").css("font-size","20px");
$('#invoices').addClass('level0 parent drop-menu active');

//list & grade on mouseover
//////////////////////////////////////////////////
$('#list').on({
'mouseover':function(){
	
	$('#list').css('border-left-color','#8c8c8c');
},
'mouseleave':function(){
	
	$('#list').css('border-left-color','#aba4a46b');
}
});
$('#grade').on({
'mouseover':function(){
	
	$('#list').css('border-left-color','#8c8c8c');
},
'mouseleave':function(){
	
	$('#list').css('border-left-color','#aba4a46b');
}
});
////////////////////////////////////////////////
	var allpro;
	 var getjson;
var invoices;
var allimages;
var msg='';
var op='dash';
var files=0;
var ref_duration=10000;

////start load all customers and invoices from server using ajax technic and list it in the invoices table
get_all_customers();

refresh();
var auto_refresh=setInterval(refresh,ref_duration);

	function refresh(){
		try{
			var refresh={};
		refresh.refresh="refresh";
	 $.post('functions.php',refresh,function(rt,ts,xhr)
		{
			if(ts=="erorr"){
				    alert("خطاء");
			 }
		   else{
		         if(xhr.readyState == 4){	
		             getjson=JSON.parse(rt);
		             allpro= getjson[0];
	               	 invoices=allpro;
					 
		 	     	create_listbutton();
                  msg_voice();
	              }
		       }
		});
}
		catch(ex){
		alert(ex.message);
		}		
	}
	
     // msg_voice();
	function msg_voice(){
			$("#msg_voice").html("<audio id='audio' ><source src='voice/ptt_middle_fast.m4a' type='audio/mp4'>متصفحك لايدعم صيغة الصوت من نوع m4a .</audio>");
	        $("#audio").attr({'autoplay':'autoplay','preload':'preload'});
	}

/////////////////////get_all_customers////////////
var customers;
function get_all_customers(){
			var get={};
		get.get_all_customers="";
	 $.post('functions.php',get,function(rt,ts,xhr)
	{
		if(ts=="erorr"){
				    alert("خطاء");
		 }
		else{
		     if(xhr.readyState == 4){	
		            customers=JSON.parse(rt);
                  	//fill customers drop-menu//
                 for(i=0;i<customers.length;i++){
                  	   $('#suggestion').append('<li id="custom'+customers[i][0]+'" data-id="'+customers[i][0]+'"  data-name="'+customers[i][1]+'" class="custom_item" >'+customers[i][1]+'<hr class="hr"></li>');
	                  	//hover the same of use mouseover
                   $('#custom'+customers[i][0]+'').hover(function(){
					   var id=$(this).attr('data-id');
					   var name=$(this).attr('data-name');
	                  	$("#custom_name").val(name);
						 $("#custom_name").attr('data-id',id);
						
                    });
                 }
	         }
		 }
   });
}	
////////get_customer invoices by customer id//////
var custom_invoices;
//get_cutom_invoices(1);
function get_cutom_invoices(custom_id){
			var get={};
		get.get_cutom_invoices="";
		get.custom_id=custom_id;
	 $.post('functions.php',get,function(rt,ts,xhr)
		{
			if(ts=="erorr"){
				    alert("خطاء");
			 }
		   else{
		         if(xhr.readyState == 4){	
		             getjson=JSON.parse(rt);
		             custom_invoices= getjson;
					 //console.log(custom_invoices);
	              }
		       }
		});
	}	

/////////////////////get_customer////////////
var custom_info;
	//get_customer(1); 
function get_customer(custom_id){
			var get={};
		get.get_customer="";
		get.custom_id=custom_id;
	 $.post('functions.php',get,function(rt,ts,xhr)
		{
			if(ts=="erorr"){
				    alert("خطاء");
			 }
		   else{
		         if(xhr.readyState == 4){	
		             custom_info=JSON.parse(rt);
					 //console.log(custom_info);
	              }
		       }
		});
	}	
	
////////////////suggestions///////////////////////////////////
	$('#suggestion').hide();
	$("#custom_name").on('click',function(){
			$('#suggestion').fadeIn(5000);
	});
	$("#custom_name").on('focusout',function(){
		$('#suggestion').fadeOut("5000");
	});
	$("#custom_name").on('focus',function(){
		//$('#suggestion').slideDown("slow");
		$('#suggestion').fadeIn("5000");
		if($(this).val()!=""){
		$("#custom_name").keyup();
		console.log(keyup);
		}
	});
$("#custom_name").on('keyup',function(){
	           var name;var patt;var res;
			   
	           var search=$(this).val();
	$('#suggestion').html(' <li id="new_custom" class="custom_item" style="background-color:#eee" > حساب جديد<hr></li>');
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
			         	   $('#suggestion').append('<li id="custom'+list_sort[i][0]+'" data-id="'+list_sort[i][0]+'"  data-name="'+list_sort[i][1]+'" class="custom_item" >'+list_sort[i][1]+'<hr class="hr"></li>');
	                  	//hover the same of use mouseover
                      $('#custom'+list_sort[i][0]+'').hover(function(){
					     var id=$(this).attr('data-id');
					     var name=$(this).attr('data-name');
	                  	$("#custom_name").val(name);
						 $("#custom_name").attr('data-id',id);
                      });
				   }
			   }
			   else{
				   get_all_customers();
			   }
	});
//////////////////upload images////////////////////////////////
	$('#file').on('change',function(e){
		files=e.target.files.length;
		console.log(e);
		  $("#selectedimg").css("color","#b9b408").css("font-size","18px");
    $("#selectedimg").html(files+" صورة محددة");
	});
$('#formUpload').on('submit',function(e){
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

//////search /////////////////////
  function search_focus(){
        	$('#search').focus();
			if($('#search').val()!="")
			$('#search').keyup();
    }
    $('#rssearchspan').click(function(){
			search_focus()
	});
	$('#research-ico').click(function(){
			search_focus()
	});
	$('#searchdone').click(function(){
			search_focus()
	});
	$('#searchdone').click(function(){
			$('#search').focus();
	});
	
$('#search').on('keyup',function(){
		 var result;
		 var search={};
		 search.search='search';
	      search.text=$(this).val();
        		
				 // create_listbutton();
	 	 $.post('functions.php',search,function(rt,ts,xhr)
		   {	
		      result=JSON.parse(rt);
			   var count=result[0];
			   console.log(xhr);
			   console.log(count);
	            if(count>=1){  //if insert execute successfully 
			   invoices= result[0];				  
					 if(search.text!=""){
						  $("#title").hide();
							 $("#mssg").css("color","rgb(16, 196, 105)").css("font-size","20px");
							     $("#mssg").html("<span style='color:#0397d6;'>"+count+"</span>"+" نتيجة بحث عن  <span style='color:#0397d6;'>"+search.text+"</span>");	
						      	
					 }
			       else{
					       $("#title").show();
						    $("#mssg").html("");
						
				   }
				   
				 }
			    else {
					 $("#title").hide();
			        $("#mssg").html("لايوجد نتائج مطابقة ل <span style='color:#0397d6;'>"+search.text+"</span>").css("color","rgb(249, 117, 113)").css("font-size","20px");
					invoices.length=0;
	              }
		
				  create_listbutton();
				    // initial_pro();
	           });
			   
	 });

/////////////// loading custom project ///////////////////////////////
    var count;
	var view;
	var mode;
	var count_int;
	var group;
	var btns;
	var  listgroup_list;
	var initial_btn=0;
//refresh();
function create_listbutton(){
	
	$('#groups').html('<li id="prev" class="page-item disabled" style="margin: 1px 0px 0px 0px;"><a href="#">السابق</a></li>');	   
     count=invoices.length;
	// console.log(count);
     view=10;
	 mode=(count%view);
	 count_int=(count-mode);
	 group=count_int/view;
	 btns;
	 listgroup_list=[];
     var begin;var end;
	
	if(mode> 0){
		btns=group+1;
	}
   else if(mode==0)
	   btns=group;

   for(i=0;i< btns;i++){
	    begin=(view * i);
		
	   if(i<group)
	      end=begin+view;
	   else
		  end=count;
	   //  console.log(end);
	   var progroup=[];
	   var k=0;
	 for(j=begin;j< end;j++){
		   progroup[k]=invoices[j];//project information
		 k++;
		  
	 }
	 //end inner for	   
	
      listgroup_list[i]=progroup; 

      $('#groups').append('<li id="btn'+i+'" data-list="'+i+'" class="page-item" style="margin: 1px 0px 0px 0px;"><a href="#" class="page-link">'+(i+1)+'</a></li>');
         $('#btn'+i+'').click(function(){
	     var list=$(this).attr('data-list');
		 
	     initial(list);
		 initial_btn=list;
		 $("#selectAll").prop("checked", false);
         });
         //end btn click event 
  }
  //console.log(listgroup_list);
  //end outer for
 
       if(count>=1){
          $('#btn0').addClass('page-item active');
    	}
		else{
			count=0;
						 $('#groups').html('<li id="prev" class="page-item disabled" style="margin: 1px 0px 0px 0px;"><a href="#">السابق</a></li>');	 
		}

 		initial(initial_btn);
	  $('#groups').append('<li id="next"class="page-item disabled" style="margin: 1px 0px 0px 0px;"><a href="#" class="page-link">التالي</a></li>');

    }
   //end function create_listbutton
   
function initial(list){
	//console.log(listgroup_list[list]);
				invoices=listgroup_list[list];
				//console.log(invoices)
				console.log($('#list').attr('data-active')+$('#grade').attr('data-active'));
				if($('#list').attr('data-active')==1){
					
					initial_pro();
				}
			else if($('#grade').attr('data-active')==1){
				$('#grade').attr('data-active',"0");
				initial_pro();
				$('#grade').click();
								//initial_grid();
			}

			
		 $('#show-hint').html(' <b id="count-group">'+invoices.length+'</b> من أصل <b id="count-hint">'+count+'</b> فاتورة');
		
		for(i=0;i<btns;i++){
		  $('#btn'+i).removeClass('page-item active');
	  }
	    $('#btn'+list).addClass('page-item active');
	
          }
		  
////////////////////////////////////////////////////////////////////////////
//////////////////////list & grid projects display styles/////////////
function list_style(){
		if($('#list').attr('data-active')==0){
			     $('#list').css('background-color','white'); 
			     $('#grade').css('background-color','#e6e6e6');	
				 $('#grid').hide();		
                 $('#list').attr('data-active',"1");
		     	 $('#grade').attr('data-active',"0");			  
		  }
  }
$('#list').on('click',function(){
		 if($(this).attr('data-active')==0){
			     list_style();
				   $(this).attr('data-active',"1");
				 refresh();
				 // auto_refresh=setInterval(refresh,ref_duration);
                 initial(initial_btn);	
				 for(i=0;i<invoices;i++){
			         pro_grade[i]=invoices[i][0];
		          }	
			}
 });
 

		var pro_grade;//
function initial_grid(){
 back();//back from add_item to browse_items in table style or grid style
	$('#grid').html("");
var invoice=invoices;
var custom_name;
//console.log(pro_grade);
  for(i=0;i<invoice.length;i++){
		      for(j=0;j<customers.length;j++){
				   if( customers[j][0]==invoice[i][1]){
					   custom_name = customers[j][1];
					   break;
				    }
			    }
		$('#grid').append(' <div id="div'+invoice[i]["0"]+'" data-rowid="'+invoice[i]["0"]+'" class="flex_item">  <div class="" style="float: right;width: 64px;"><img src="images/men-img.png" style="max-width: 100%;box-shadow: none;vertical-align: middle;border: 0;"></div>       <div style="padding-right: 72px;    width: 100%;"><strong class="" style="font-weight: bold;    ">'+custom_name+' </strong>     <ul style="list-style-type: none;padding: 0; ">   <li>'+invoice[i]["2"]+'</li>  <li>'+invoice[i]["3"]+'</li>  <li class="">'+invoice[i]["4"]+'</li>   </ul></div>            </div>');
		  msg_voice();

		$('#div'+invoice[i]["0"]+'').mouseover(function(){
			$(this).css("background-color","#efeff8");
		});
		
		$('#div'+invoice[i]["0"]+'').mouseleave(function(){
			$(this).css("background-color","white");
		});
		
		$('#div'+invoice[i]["0"]+'').click(function(){
		 var id=$(this).attr('data-rowid');
		 var row=$('#edit'+id+'');
		 console.log(row.attr('data-id'));
		 
		    goto_edit(row);
		});
		
  }
 msg_voice();
}	
$('#grade').on('click',function(){
	//clearInterval(auto_refresh)	;
	//console.log("hhhhhhhhh");
	   if($(this).attr('data-active')==0){
		  // console.log("hhhhhhhhh");
		  	$(this).css('background-color','white'); 
	     	$('#list').css('background-color','#e6e6e6');
			$(this).attr('data-active',"1");
		    $('#list').attr('data-active',"0");
            $('#addpro').attr('data-cont',$('#containt').html());
	      
		  $('#table-hover').hide();
      	 // $('#tbl_body').hide();
	      //$('#tbl_head').hide();
		    $('#grid').show();
			     
		//	auto_refresh=setInterval(initial_grid,ref_duration);
			initial_grid();
		 }
   });
////////////////////////////////////////////////////////////////////////////

function initial_pro(){
	back();//back from add_item to browse_items in table style or grid style
	 $('#tbl_body').html("");
  $('#table-hover').show();
   list_style();
			//$('#del').addClass('back-btn');
	 $('#tbl_body').html("");
	 	 /////show footer button
for(i=0;i<invoices.length;i++){
   for(j=0;j<customers.length;j++){
				   if( customers[j][0]==invoices[i][1]){
					   custom_name = customers[j][1];
					   break;
				    }
			    }
var pro={};
 pro.id=invoices[i]["0"];
		 pro.v_name=custom_name;
		 pro.v_lat=invoices[i]["2"];
		 pro.v_lng=invoices[i]["3"];
		 pro.v_info=invoices[i]["4"];
		 pro.v_category=invoices[i]["5"];
		  pro.v_start_date=invoices[i]["6"];
		  pro.v_finish_date=invoices[i]["7"];
		  pro.v_status=invoices[i]["8"];
		  pro.v_progerss="آجل(ديّن)";
		  pro.v_position=[v_lat,v_lng];
		var html_id="td"+pro.id;
/*	var v_photo=projects[i]["8"];
	var photo;var alt;
	var title=v_photo;
	if(v_photo){ photo=v_photo;alt="photo";}else{photo="/images/avatar.png";alt="no photo"}
	*/
	/*+'<img  class="w3-col" src="../'+photo+'" alt="'+alt+'" title='+title+' profile" style="width:50px;border-radius:50%">'+*/
	var classs;var status;
 if(pro.v_status==1) { classs="status text-success"; status="مؤكد";}else{  classs="status text-danger"; status="غير_مؤكد";}
		
         	$('#tbl_body').append(' <tr id="tr'+pro.id+'" data-rowid="'+pro.id+'"> <td><span class="custom-checkbox"><input class="checkboxitem" id="checkbox'+ pro.id+'" name="options[]" value="1" type="checkbox"><label for="checkbox'+ pro.id+'"></label></span></td>                                                                                                        <td id="id'+pro.id+'">'+ pro.id+'</td>     <td id="name'+pro.id+'">'+ pro.v_name+'</td>     <td>'+  pro.v_lat+'</td>     <td class="td-lnglat">'+pro.v_progerss+'</td>   <td class="td-lnglat">'+pro.v_lng  +'</td>		<td>'+  pro.v_info+'</td><td><div id="proggers"><span class="'+classs+'">•</span>'+ status+'</div></td><td id="action">                                                                               <a id="edit'+pro.id+'" data-id="'+pro.id+'" data-name="'+pro.v_name+'" data-info="'+pro.v_info+'" data-category="'+pro.v_category+'" data-start_date="'+pro.v_start_date+'"  data-finish_date="'+pro.v_finish_date+'"  data-lat="'+pro.v_lat+'"  data-lng="'+pro.v_lng+'" data-status="'+pro.v_status+'"    href="#"  class="edit"  >  </i></a>                                                                                 <a id="deletepro'+pro.id+'" data-proid="'+pro.id+'" href="#deletepro" class="delete" )><i class="glyphicon glyphicon-remove" data-toggle="tooltip" title="" data-original-title="حذف"></i></a></td></tr>');
			
     $('#tr'+pro.id+' td:not(:first-of-type):not(:last-of-type)').click(function(){
		 var id=$(this).parent().attr('data-rowid');
		 var row=$('#edit'+id+'');
			goto_edit(row);
	});
				
	$('#edit'+pro.id+'').click(function(){
		    var row=$(this);
			goto_edit(row);
			});
		
     $('#deletepro'+pro.id+'').click(function(){
				var id=$(this).attr('data-proid');
				var name=$('#edit'+id+'').attr('data-name');
				var sum=$('#edit'+id+'').attr('data-lat');
			//	console.log(id);
			    $(this).attr('data-toggle',"modal");
				$('#deletinfo').html('هل انت متأكد من حذف الفاتورة رقم: <b color="#ff5b5b"> '+id+'؟</b><br><b color="#ff5b5b">الإسم: '+name+'<br>القيمة: </b>'+sum);
				
			  $('#delete').click(function(){
				  			  $(this).attr('data-dismiss',"modal").attr('aria-hidden',"true" );	  
				deletepro(id);		
		       });
			});
}
	$('#tbl_body').append(' <tr id="final_tr" style="height:33px;"> <td></td>  <td></td>    <td ></td>   <td ></td>   <td ></td>   <td ></td>   <td ></td>   <td ></td>   <td ></td>   </tr>');

}
////////////////////////////////////////////////////////////////////////
//back from add_item to browse_items in table style or grid style
function back(){
	$('#refresh').show();
	$('#confadd').hide()
	$('#formUpload').hide();
	//$('.table-title').css('border-bottom','1px solid #a8a8a8');
      // $('#table-hover').show();
	//  $('#tbl_head').show();
	 // $('#tbl_body').show();
	   	 $('#groping').show();
	//  $('#containt').css("height","70%");
		$('#addmodal').hide(); 
		$('#del').show();
		
		$('#grade').show();
		$('#list').show();
		$('#list').addClass('back-btn');
		$('#grade').addClass('back-btn');
		//$('#grid').hide();

			//$('#del').addClass('back-btn');
	
	 	 /////show footer button
		$('#title').html(" الـفواتيــــــــر   "+msg);
			$('#addpro').addClass('back-btn');
	
			//$('#addpro').addClass('addproject');
			$('#del').addClass('addproject');
			$('#addpro').html("<img id='addpimg' src='images/icons/my_status_add.png' style='opacity:1;margin-right:-5px;margin-left:3px;' height='25px'>فاتورة جديدة");
$('#addpro').on('mouseover',function(){
	$('#addpimg').css("opacity","2");

});
$('#addpro').on('mouseleave',function(){
	//$('#addpimg').css("height","35px");
		$('#addpro').css("color","rgb(119, 119, 119)").css("background-color", "transparent");
			$('#addpimg').css("opacity","1");
});
				$('#addpro').attr('data-cont',$('#containt').html());				
				//$('#addpro').attr('data-op','dash');
				op='dash';
}

function goto_edit(row){
	op="dash";
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
			$('#addpro').html("رجوع");
			$('#addpro').addClass('back-btn');
				$('#addpro').attr('data-cont',$('#containt').html());	
				
				$('#title-dialog').html(" تعديل فاتورة ");
				$('#info-dialog').html("هل انت متأكد من تعديل الفاتورة؟");
				$('#save').html(" تعديل ");
				$('#add').hide();
				$('#edit').css("display","inline-block");

				$('#edit').on('click',update);
				//$('#edite').html(" حفظ التغيرات ");
}

var start=1;
function getall_invo(){
$('#mssg').html('');		
 $("#title").show();
$("#selectAll").prop("checked", false);
//console.log(op);
		switch(op){
			case 'dash':
			
			 clearInterval(auto_refresh);
			
			         op='add';
			$('#addpro').attr('data-cont',$('#containt').html());
	$('#table-hover').hide();
	//$('#tbl_head').hide();
	//$('#tbl_body').hide();
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
		$('#addpro').html("رجوع");

			$('#addpro').addClass('back-btn');
	
			$('#addpro').css("padding","0px 19px 0px")
		$('#del').hide();
		$('#save').html("حفظ");
		$('#edit').hide();
				$('#add').show();
			$('#invo_amount').focus();
			
			//$('#addpro').attr('data-op','add');   
	    $('#grid').hide();
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
 auto_refresh=setInterval(refresh,ref_duration);
          refresh();
		  $('#addpro').removeClass('back-btn');
		   $('#addpro').css('padding','3px 5px 0px');
	      $('#containt').css("height","79%");
		  $('.table-title').css('border-bottom','1px solid #a8a8a8');
		  initial(initial_btn);
		  for(i=0;i<invoices;i++){
			   pro_grade[i]=invoices[i][0];
		  }	
		   // console.log("addinvo");
			break;
		}
		}	
$('#addpro').click(getall_invo);

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
			var msg=jes[1];
		     invoices=jes[0];
		  if(msg===true){  //if insert execute successfully 
	 		  // $('#tbl_head').show();
			   create_listbutton();
			    auto_refresh=setInterval(refresh,ref_duration);
				   $("#mssg").css("color","rgb(16, 196, 105)");
				   $("#mssg").html("✔  تمت الإضافة ◀ ");	
				   	// $('#containt').css("height","72%");
	$('#addpro').css('padding','3px 5px 0px');
	   //   $('#containt').css("height","78%");
	   $('#reset').click();
		  } 
		  else {//if insert not execute  	
			   $("#mssg").html("❌ لم تتم الإضافة  ◀ "+msg).css("color","#e65651");
		  }
		  
	    });	
}

function deletepro(id){

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
	 		   //$('#tbl_head').show();
			    create_listbutton();
			   		$("#mssg").css("color","rgb(16, 196, 105)").css("font-size","20px");
//$("#title").hide();
				   $("#mssg").html("تم حذف الفاتورة رقم : "+json[1]);
$('#addpro').css('padding','3px 5px 0px');
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
	 		  //$('#tbl_head').show();
			   create_listbutton();
			   
				   $("#mssg").css("color","rgb(16, 196, 105)");
				   $("#mssg").html("تم التعديل بنجاح");	
				   $('#addpro').css('padding','3px 5px 0px');
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
	$("#selectAll").click(function(){
			var checkbox = $('table tbody input[type="checkbox"]');
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
					$("#selectAll").prop("checked", true);
		 }
		if(!this.checked){
		
	
	$("#selectAll").prop("checked", false);
		}
	});	
	});
 
});
	

	
</script>

</head>
<body >

<div id="msg_voice" >
</div>
  <div id="table-wrapper"  class="table-wrapper" >
		
            <div class="table-title">
                <div class="row" style="    display: inline-flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;    padding-top: 2px;">
					  <b id="title" style="font-size: 20px;">	
			  
						الفواتير</b>
						 <span id="mssg" style="color:#fff937;font-size:20px;"></span>
					<div class="col-sm-6" style="    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;">
				<div>
					<button id="addpro" data-cont="" data-op="dash"style="font-size:16px; font-weight: 600;padding: 3px 5px 0px;margin-left: 5px; background-color :#e6e6e6;
	color: #777;" class="btn btn-success" ><img id='addpimg' src='images/icons/my_status_add.png' style='opacity:1;;margin-right:-5px;margin-left:8px;' height='25px'>فاتورة جديدة</button>
					</div>
						<div>
						
					<form  id="formUpload" enctype="multipart/form-data" style="display:none" >	
					     <input  id="clear" type="button" class="btn btn-success" style="font-size:16px; font-weight: 600;padding: 2px 19px 0px;"   data-dismiss="modal" value="تهيئة" onclick="$('#reset').click(); ">
	
					<a href="#conf" id="confadd" data-toggle="modal" style="display:none">
					<button id="
" class="btn btn-info" style="font-size:16px;font-weight: 600;padding: 2px 19px 0px; value="save" >حفظ</button></a>	
					
	   
			         <img src="images/electronics-img.png" width="40px" title="إضافة صور" style="cursor:pointer;    " onclick="$('#file').click();"  >
			 		 <span  style="vertical-align: text-top;" id="selectedimg"></span>
					 <input type="file" id="file" name="file[]" multiple="multiple" style="display:none" accept="image/*" browse="gallery"  >
					 
			  <input type="submit" id="upload" name="upload" value="رفع" hidden>
				</form>

			
				
	
			
							<button id="list" data-active="1" class="btn btn-success" style="    text-align:center;	margin-left:0px;background-color:white;color: #4c4c4c;border-top-right-radius: 4px;border-bottom-right-radius: 4px;padding:0px 15px 0px 25px;">
						    <img src="images/icon_list.png" width="13px"> 
						   </button>	
							
							<button id="grade" data-active="0" class="btn btn-success" style=" margin-right: -2px;text-align:center;margin-left:0px;padding:0px 15px 0px 25px;
							color:#4c4c4c;border-top-left-radius:4px; background-color :#e6e6e6; border-bottom-left-radius: 4px;" >
						    <img src="images/icon_grid.png" width="13px"> 
						   </button>	
						
						<button id="del" class="btn btn-del" style="font-size:16px;font-weight:600;text-align:center;margin-right:0px;background-color :rgba(255, 255, 255, 0);color: #777;margin-right:5px;padding:0px 0px 0px 6px;" disabled>
						<img src="images/icons/ic_settings_delete.png" style="width:22px; height:22px;">حذف </button>	
	           		
					<a href="index.php" id="refresh" class="btn-lg " style="text-align:center;margin-right:5px" ><img src="images/ic_settings_reset.png" height="28px"></a>
  
	     </div>
		   </div>
			
			
                </div>
            </div>
			
			<div class="containt" id="containt" >
            <table id="table-hover" class="table table-striped table-hover" style="border-collapse:collapse; width:100%"  >
                <thead id="tbl_head">
                    <tr >
						<th>
							<span class="custom-checkbox">
	                            <input id="selectAll" type="checkbox">
								<label for="selectAll"></label>
							</span>
						</th>
						<th >الرقم </th>
						<th style="min-width:200px"> العميل</th>
                        <th style="min-width:70px">القيمة</th>
						<th >النوع</th>
						<th style="min-width:300px;text-align:justify">الملاحظة</th>	
                       <th style="min-width:160px">التاريخ</th>
					    <th>المسجل</th>
						 <th>حذف</th>
                    </tr>
                </thead>
                <tbody id="tbl_body">
	
                </tbody>			
		  </table>
		  
<div  id="addmodal" class="" style="display:none; "   >
					<form  class = "w3-container" role ="form" style="margin-top:0px">
					<input  id="reset" class="btn btn-success" style="font-size:16px; font-weight: 600;"   data-dismiss="modal" value="تراجع" type="reset" hidden>
				<div id="mobile-content" class="modal-content" style="display:flex;   
   flex-direction: row;
    flex-wrap: wrap;
	    justify-content: center;
     align-content: stretch;border: none;    box-shadow: none;">

		<div id="mobile-form" style="padding:8px 2px 2px 2px;border:">
				
				<input class="form-control" id="pid"  type="hidden" name="pid" >
				اسم الحساب<input id="custom_name" data-id="" class = "form-control"  type="text" name="custom_name" > 
       <ul id="suggestion">
	   <li id="new_custom" class="custom_item" style="background-color:#eee" > حساب جديد<hr></li>
	  
       </ul>
			 قيمة الفاتورة (ريال)<input id="invo_amout" class = "form-control" DIR="rtl" type="text" name="invo_amout" >
			 
	<div style="display:flex">
	<div style="margin-left:50px;width:120px">
					نوع الفاتورة <select id="pcategory" class = "form-control" style="  height: 40px; padding-top: 6px;" name="invo_type"><option>دين (اجل)</option><option>دفع (مسلم)</option></select> 
</div>              
<div style="width:120px">
			 حالة الفاتورة <select id="invo_status" class = "form-control" style="  height: 40px;padding-top: 6px;" name="invo_status"><option>مفتوحة</option><option>مدفوعة</option> <option>مسودة</option></select>
</div>
	</div>
	
				ملاحظة<textarea id="plng" class = "form-control"  type="text" name="pfinish_date" rows="2" required> </textarea>	  التاريخ<input id="pinfo" class = "form-control"  DIR="rtl" type="text" name="pinfo"  >
				 اخرى<input class = "form-control"  DIR="rtl" type="text" name="pinfo"  >
				  الاعتمادات<input  class = "form-control"  DIR="rtl" type="text" name="pinfo"  >
			 					
</div>	
   </div>      
</form>
</div>

			
<div id="conf" class="modal fade" style="display: none;">
      <div class="modal-dialog"><div class="modal-content"><div class="modal-header" style="padding:15px 12px 13px 15px">						<h4  id="title-dialog"class="modal-title" style=" margin: 0px 25px 0px 0px;">إضافة فاتورة</h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button></div><div class="modal-body" >					<p id="info-dialog">هل انت متأكد من إضافة الفاتورة؟</p><p class="text-warning"><small>تأكيد للإستمرار أو تراجع لعدم الحفظ</small></p></div><div class="modal-footer" style="padding:15px 30px">	<button id="add"  class="btn btn-info" type="button"  data-dismiss="modal" aria-hidden="true" title="save new project" name="save" style="display:inline-block"   >تأكيد</button>	<button id="edit"  style="display:none" class="btn btn-info" type="button"  data-dismiss="modal" aria-hidden="true" title="" name="edit"    >تأكيد </button><input class="btn btn-default"  name="cancel" data-dismiss="modal"		title="إغلاق النافذة" value="تراجع" type="button"  style="display:inline-block;color:#333;background-color:#fff;border-color:#4c4c4c"></div></div></div>
</div> 
				
<div id="deletepro" class="modal fade" style="display: none;"><div class="modal-dialog">
    <div class="modal-content"><div class="modal-header" style="padding:15px 12px 13px 15px"><h4 class="modal-title" style="    margin-right: 8px;">حذف الفاتورة</h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button></div><div class="modal-body" style="padding-bottom: 2px;
    padding-top: 15px;"><p id="deletinfo">?</p><p class="text-warning"><small> حذف للتأكيد او إلغاء لعدم الحذف</small></p></div><div class="modal-footer" style="padding:15px 30px"><input   name="u_name" value="'+v_name+'" type="hidden">
   <input   name="u_id" value="'+id+'" type="hidden"><input class="btn btn-danger" id="delete"  name="delete" value="حذف" type="submit" style="display:inline-block"><input class="btn btn-default" name="cancel" data-dismiss="modal" value="إلغاء" type="button"style="display:inline-block;color:#333;background-color:#fff;border-color:#4c4c4c"></div></div></div>
</div>	
		  
<div id="grid" class="flex_container" style="display: none;">


</div> 
				
			
</div>
		  		<div id="groping" class="clearfix" style="    padding: 5px;">
                <div id="show-hint" class="hint-text"style="float:right"></div>
                <div style="display: grid;">  
				   <ul id="groups" class="pagination" style="flex-direction: row;
    justify-content: flex-start;
    align-content: space-evenly;
    overflow-x: scroll;
    display: flex;">
                   </ul>
				</div>
            </div>
    </div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>

<script type="text/javascript">
    //<![CDATA[
(function(){
       $('#imgbtn').click(function(){
       $('#addimg').toggle();
       });
	jQuery(function() {
		jQuery(".slideshow").cycle({
			fx: 'scrollHorz', easing: 'easeInOutCubic', timeout: 10000, speedOut: 800, speedIn: 800, sync: 1, pause: 1, fit: 0,pager: '#home-slides-pager',
			prev: '#home-slides-prev',
			next: '#home-slides-next'
		});
	});
});
    //]]>
		new UISearch( document.getElementById( 'form-search' ) );
setTimeout(hidedive,5000);
function hidedive(){
var b= document.getElementsByTagName('body');
if(b[0].children[b[0].children.length-1].tagName=="DIV"){
b[0].children[b[0].children.length-1].style="display:none"
}
 
}
</script>
		
</body>
</html>



