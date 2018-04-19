
function note(str) {
	
	//alert(document.getElementById("dropdown").value);
	//alert(Number(document.getElementById("page").value));
	document.searchForm.submit();
	//alert("Hello");
}
function pagingJS(str) {
	document.getElementById("pageNo").value = Number(str)*Number(document.getElementById("dropdown").value);
	document.getElementById("page").value = Number(str);
	document.searchForm.submit();
	
}
function active(id)
{
	
	document.getElementById("id").value = Number(id);alert("hello");
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	document.searchForm.submit(); 
	 
}
function detete1(del)
{
	document.getElementById("del").value = Number(del);
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	if(confirm('Are you sure you want to delete ?')) {
		document.searchForm.submit(); 
	}
	else
	{
	//alert("No");
	}
}
function edit(edit)
{	
	
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	document.getElementById("searchForm").action="/iMemet/admin/index.php/promotion/edit/"+edit;
	document.searchForm.submit(); 
	 
}
function editNews(edit)
{	
	
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	document.getElementById("searchForm").action="/iMemet/admin/index.php/news/edit/"+edit;
	document.searchForm.submit(); 
	 
}
function editAriticles(edit)
{	
	//alert("hello");
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	document.getElementById("searchForm").action="/iMemet/admin/index.php/ariticles/edit/"+edit;
	document.searchForm.submit(); 
	 
}
function editCountry(edit)
{	
	//alert("hello");
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	document.getElementById("searchForm").action="/iMemet/admin/index.php/users/editCountry/"+edit;
	document.searchForm.submit(); 
	 
}
function editCoupon(edit)
{	
	//document.getElementById("edit").value = Number(edit);
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	document.getElementById("searchForm").action="/iMemet/admin/index.php/coupon/edit/"+edit;
	document.searchForm.submit(); 
	 
}
function editProduct(edit)
{	
	//document.getElementById("edit").value = Number(edit);
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	document.getElementById("searchForm").action="/iMemet/admin/index.php/product/editProduct/"+edit;
	document.searchForm.submit(); 
	 
}
function editCategory(edit)
{	
	//document.getElementById("edit").value = Number(edit);
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	document.getElementById("searchForm").action="/iMemet/admin/index.php/category/edit/"+edit;
	document.searchForm.submit(); 
	 
}
function sendCoupon(couponId)
{
	//alert(couponId);
	document.getElementById("couponId").value = Number(couponId);
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	if(confirm('Are you sure you want to Send Coupon ?')) {
		document.searchForm.submit(); 
	}else{
		
	}
	 
}
