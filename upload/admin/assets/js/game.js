// JavaScript Document
var cnt = 0;                                                           // count cell
var ct = '';                                                           //cell type
var cr = ''; var mncr = ''; var mxcr = '';                             //cell row; minimum cell row; maximum cell row
var cc = ''; var mncc = ''; var mxcc = '';                             //cell column; minimum cell column; maximum cell column
var c2c = '';                                                          //set row from to and column from to
var celid = '';  
var task = 'add';
var blockId = '';
function setBlock(val) {
	task = val;
}
//cell ID
function cell(r,c) {  
	if(task=='select') {
		checkGroup(r,c);
	}
	else {
		c2c = sc(r,c);														//set clicked cell id
		//alert(c2c);                                                        //set selected cell
		if(ct=='n') rClass();	
		else if(cc == c || cr == r) selectedClass(r,c);                    //add selected class to cell	                                  
		else rClass();
		setTextbox();
	}
}
function sc(r,c) {                                                     //selected cell 
	if(!cnt) {
		cnt = 1;
		setSize(r,c);//set minimum maximum cell row column
		return false;
	} 
	else if(cnt==1) {	
		if((ct=='r' && cr!=r) || (ct=='c' && cc!=c)) { //check for wrong row or column
			rClass();
		}
		ct=(cr==r?'r':(cc==c?'c':'n'));                                //set cell type
		setSize(r,c);												   //set minimum maximum cell row column
		//alert(ct+" row:"+r+" col:"+c+" minrow:"+mncr+" maxrow:"+mxcr)
		return ct=='r'?c:(ct=='c'?r:false);                            //set colto row or row to col
	}
	else {
		
	}
}
function setSize(r,c) {
	removeClass();
	if(ct) {
		if(ct=='r') {
			//alert('mincelcol'+mncc+',maxcelcol:'+mxcc);
			/*if(mncc>c ) {
				mxcc = mxcc>mncc?mxcc:mncc;
				mncc=c;
			}
			else if(mncc<c ) {
				mxcc=mxcc>c?mxcc:c;
				
			}*/
			if(mncc>c ) {
				//mxcc = mxcc>mncc?mxcc:mncc;
				mncc=c;
			}
			else if(mncc<c ) {
				mxcc=c;
				
			}
			
			//alert('mincelcol'+mncc+',maxcelcol:'+mxcc);
		}
		else {
			if(mncr>r ) {
				//mxcr = mxcr>mncr?mxcr:mncc;
				mncr=r;
			}
			else if(mncr<r ) {
				mxcr=r;
				
			} 			
		}
	}
	else {
		mncr = mxcr = cr = r; mncc = mxcc = cc = c;
	}
}
function removeClass() {
	$('#answerId').val('');
	if(task=="add")
	$('.selectedClass').text('');
	$('.cellRow').removeClass('selectedClass');                        //remove all selected class
	                                         //set to initialize values in the all parameters
}
function rClass() {
	$('#answerId').val('');
	$('.selectedClass').text('');
	$('.cellRow').removeClass('selectedClass');                        //remove all selected class
	cr='';cc='';ct='';c='';r='';cnt=0;                                           //set to initialize values in the all parameters
}
function selectedClass(r,c) {
	if(ct) {
		if(ct=='r') {
			var minc = (Number(mncc)>Number(mxcc)?Number(mxcc):Number(mncc));
			var maxc = (Number(mncc)<Number(mxcc)?Number(mxcc):Number(mncc));
			//alert(mncc+" "+mxcc+" and after set min:"+minc+"; max:"+maxc+"r");
			mncc = minc;mxcc = maxc;
			//alert(minc+" "+mncc+" and "+maxc+" "+mxcc);
			for(var i=minc;i<=maxc;i++){
				celid = "#cell"+r+"_"+i;
				$(celid).addClass('selectedClass');
			}
		}
		else {
			var minc = (Number(mncr)>Number(mxcr)?Number(mxcr):Number(mncr));
			var maxc = (Number(mncr)<Number(mxcr)?Number(mxcr):Number(mncr));
			mncr = minc;mxcr = maxc;
			//alert();
			//alert(minc+" "+mncr+" and "+maxc+" "+mxcr);
			for(var i=minc;i<=maxc;i++){
				celid = "#cell"+i+"_"+c;
				$(celid).addClass('selectedClass');
			}
		}
	}
	else {
		celid = "#cell"+r+"_"+c;
		$(celid).addClass('selectedClass');
	}
}
function setTextbox() {
	var maxlen = 0;
	if(ct=='r')
	maxlen = mxcc-mncc+1;
	else
	maxlen = mxcr-mncr+1;
	$('#answerId').attr('maxlength',maxlen)
	//alert('mincelrow:'+mncr+'; maxcelrow'+mxcr+';  mincelcol:'+mncc+'; maxcelcol'+mxcc)
}
function textwrite() {
		var str = ($('#answerId').val());
	if(ct=='r') {
		for(var i=mncc;i<=mxcc;i++) {
			celid = "#cell"+cr+"_"+i;
			$(celid).text(str.substring(Number(i-mncc), Number(i-mncc+1)));
			//$('celid').val(str.substring(i, 1)); 
		}
	}
	else if(ct=='c'){
		for(var i=mncr;i<=mxcr;i++) {
			celid = "#cell"+i+"_"+cc;
			$(celid).text(str.substring(Number(i-mncr), Number(i-mncr+1)));
		}
	}
}
function test() {
	if(ct=='r') {
		var str = "string";
		for(var i=mncc;i<=mxcc;i++) {
			celid = "#cell"+cr+"_"+i;
			$(celid).text(str.substring(Number(i-mncc), (i-mncc+1)));
			//$('celid').val(str.substring(i, 1)); 
		}
	}
	else if(ct=='c'){
		for(var i=mncr;i<=mxcr;i++) {
			celid = "#cell"+i+"_"+cc;
		}
	}
	/*if(ct=='r')
	alert(mncc+" "+mxcc);
	else if(ct=='c')
	alert(mncr+" "+mxcr);*/
}
/*SAVE DATA IN THE DATABASE*/
$( "#target" ).click(function() {
	if($("#serial").val()) {
	$('#loader').html('<img style="margin-left: 230px;margin-top: 100px;margin-bottom: 110px;" src="/crosswords/admin/assets/images/ajax-loader2.gif"/>');
	$('#loader').css('display','block');
	$.ajax({
		url: 'http://52.9.22.124/admin/index.php/game/addAns?game_id='+($("#gameId").val())+'&category='+($("#categoryId").val())+'&question='+($("#questionId").val())+'&answer='+($("#answerId").val())+'&type='+(ct=='c'?'col':'row')+'&min_row='+(mncr)+'&min_col='+(mncc)+'&max_row='+(mxcr)+'&max_col='+(mxcc)+'&task='+task+'&serial='+($("#serial").val()), 
		type:'POST',		
		//	dataType: 'json',
		error: function(){
			$('#datad').html('<p>goodbye world</p>');
		},
		
		success: function(data){
			if(data=="error") {
				alert('Cell contain different Value');
				location.reload(true);
			} 
			else {
				$('#datad').html(data);
				$('.selectedClass').addClass('fixClass');
				$('.fixClass').removeClass('selectedClass');
				$('#loader').css('display','none');
				$('#loader').html('');
			}
		} // End of success function of ajax form
	}); // End of ajax call
	getGameData();
	}
	else {
		alert('put the value of serial name');
	}
});
////////check grooup create or not/////////////////////
var grpData;
function checkGroup(r,c) {
	//alert(r);
	$('#loader').html('<img style="margin-left: 230px;margin-top: 100px;margin-bottom: 110px;" src="/crosswords/admin/assets/images/ajax-loader2.gif"/>');
			$('#loader').css('display','block');
			for (var i = 0; i< (grpData.length); i++) {
				mt = grpData[i];
				if(mt.min_row<=r && mt.max_row>=r && mt.min_col<=c && mt.max_col>=c) {
					ct = mt.type=="row"?"r":"c";
					mncr = mt.min_row;
					mxcr = mt.max_row;
					mncc = mt.min_col;
					mxcc =  mt.max_col; 
					cc = c; cr = r;
					blockId = mt.id;
				console.log(mncc+" "+mxcc);
					
					removeClass();
					selectedClass(r,c);
					$('#questionId').val(mt.question);
					$('#answerId').val(mt.answer);
					$('#serial').val(mt.serial);
					$('#answerId').attr('maxlength',mt.answer.length);
					//alert("row:"+r+"; col:"+c+";  answer:"+mt.answer);
				}
				
			}
			$('#loader').css('display','none');
	
}
function getGameData() {
	$('#loader').css('disply','block');
	$('#loader').html('<img style="margin-left: 230px;margin-top: 100px;margin-bottom: 110px;" src="/crosswords/admin/assets/images/ajax-loader2.gif"/>');
	$.ajax({
		url: 'http://52.9.22.124/admin/index.php/game/getGameData?game_id='+($("#gameId").val())+'&category='+($("#categoryId").val()), 
		type:'POST',		
		//	dataType: 'json',
		error: function(){
			$('#loader').html('<p>goodbye world</p>');
		},
		
		success: function(data){
			//alert(data);
			var jsonData = JSON.parse(data);
			var mt; var id = '';
			for (var i = 0; i< (jsonData.matrix.length); i++) {
				mt = jsonData.matrix[i];
				//console.log(mt.r);
				id = "#cell"+mt.r+"_"+mt.c;
				//alert(mt.v);
				$(id).css('background','#CCC');
				$(id).text(mt.v);
			}
			grpData = jsonData.group;
	$('#loader').css('disply','none');
	$('#loader').html('');
			
		} // End of success function of ajax form 
	});
}
//////////////////////////////////////
$('.btn').click(function(){
	$('.btn').removeClass('selectedBtn');
	$(this).addClass('selectedBtn');
	});
	//////////////////////////////
///////////////////////DELETE BLOCK START/////////////////////
	function removeBlock() {
		$.ajax({
			url: 'http://52.9.22.124/admin/index.php/game/deleteBlock?game_id='+($("#gameId").val())+'&category='+($("#categoryId").val())+'&quest_id='+blockId, 
			type:'POST',		
			//	dataType: 'json',
			error: function(){
				$('#loader').html('<p>goodbye world</p>');
			},			
			success: function(data){
				//alert(data);
				location.reload(true);
			} // End of success function of ajax form 
		});
	}

///////////////////////DELETE BLOCK START/////////////////////
///////////////////////RESET PUZZLE START/////////////////////
function resetPuzzle() {
	if(confirm('Are you sure, you want to Reset the Puzzle')) {
	$.ajax({
			url: 'http://52.9.22.124/admin/index.php/game/resetPuzzle?game_id='+($("#gameId").val()), 
			type:'POST',		
			//	dataType: 'json',
			error: function(){
				$('#loader').html('<p>goodbye world</p>');
			},			
			success: function(data){
				//alert(data);
				location.reload(true);
			} // End of success function of ajax form 
		});
	}
}
///////////////////////RESET PUZZLE END///////////////////////