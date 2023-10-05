
var myDefaultWhiteList = $.fn.tooltip.Constructor.DEFAULTS.whiteList
myDefaultWhiteList.table = []
myDefaultWhiteList.tbody = []
myDefaultWhiteList.tr = []
myDefaultWhiteList.td = []

$(document).ready(function() {
	
	$("#filter_button").click(function(){
		$(this).toggleClass("active");
		$(this).find(".glyphicon").toggleClass("glyphicon-menu-down glyphicon-menu-up");
		$(this).find(".text-show, .text-hide").toggleClass("text-show text-hide");
	});
	
	$("#id_continent").change(function() {
		var continent = $(this).val();
		$("#id_country").prop("disabled", (continent=="all"));
		$.getJSON("/api/countries", {continent: continent}, function(data){
			var country = $("#id_country");
			country.empty();
			country.append('<option value="all">--- All countries ---</option>');
			var index;
			for (index in data) {
				var option = $("<option></option>").text(data[index]);
				option.attr("value", data[index]);
				country.append(option);
			}
			$("#id_country").change();
		});
	});
	$("#id_country").change(function() {
		var continent = $("#id_continent").val();
		var country = $(this).val();
		$("#id_province").prop("disabled", (country=="all"));
		$.getJSON("/api/provinces", {continent: continent, country: country}, function(data){
			var province = $("#id_province");
			province.empty();
			province.append('<option value="all">--- All provinces ---</option>');
			var index;
			for (index in data) {
				var option = $("<option></option>").text(data[index]);
				option.attr("value", data[index]);
				province.append(option);
			}
		});
	});
	
	
	
	
	
	$('[data-toggle="popover"]').popover({
		title: function () {
			var popover = $(this).data("popover");
			return $(popover).find(".title").text();
		},
		content: function () {
			var popover = $(this).data("popover");
			return $(popover).find(".content").html();
		},
		html: true,
		container: 'body'
	});
	
	$(".menu").click(function() {
		$("nav").toggleClass("responsive");
		return false;
	});
	
	$("a.show_specimens").click(function() {
		// Reset saved state in the specimens table to make sure
		// the pagination will start at the first page
		var href = $(this).data("href");		
		if (typeof(Storage) !== "undefined") {
    		localStorage.setItem("DataTables_result_" + href, "{}");
		}
		return true;
	});
});