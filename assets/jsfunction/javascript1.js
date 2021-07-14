function dispresults(){

	// eval('protein = $("#protein").val();');
	var protein = $("#protein").val();
	if (protein == 0) { //eval('$("#protein_indic").css("background","gray")');
						$('#protein_indic').css('background', 'gray');
	}else if (protein <= 25) { $('#protein_indic').css('background', 'green');
	}else if (protein > 25) { $('#protein_indic').css('background', 'yellow');	
	}else { $('#protein_indic').css('background', 'white'); }

	var vitaA = $("#vitaA").val();
	if (vitaA == 0) { $('#vitaA_indic').css('background', 'gray'); //if null or 0
	}else if (vitaA > 1237.5) {	$('#vitaA_indic').css('background', 'red'); // if greater than max value
	}else if (vitaA > 750) { $('#vitaA_indic').css('background', 'yellow'); // if greater than min value
	}else if (vitaA <= 750) { $('#vitaA_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#vitaA_indic').css('background', 'white'); }

	var vitaC = $("#vitaC").val();
	if (vitaC == 0) { $('#vitaC_indic').css('background', 'gray'); //if null or 0
	}else if (vitaC > 45) {	$('#vitaC_indic').css('background', 'red'); // if greater than max value
	}else if (vitaC > 30) { $('#vitaC_indic').css('background', 'yellow'); // if greater than min value
	}else if (vitaC <= 30) { $('#vitaC_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#vitaC_indic').css('background', 'white'); }

	var vitaD = $("#vitaD").val();
	if (vitaD == 0) { $('#vitaD_indic').css('background', 'gray'); //if null or 0
	}else if (vitaD > 8.25) {	$('#vitaD_indic').css('background', 'red'); // if greater than max value
	}else if (vitaD > 5) { $('#vitaD_indic').css('background', 'yellow'); // if greater than min value
	}else if (vitaD <= 5) { $('#vitaD_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#vitaD_indic').css('background', 'white'); }

	var vitaE = $("#vitaE").val();
	if (vitaE == 0) { $('#vitaE_indic').css('background', 'gray'); //if null or 0
	}else if (vitaE > 16.5) {	$('#vitaE_indic').css('background', 'red'); // if greater than max value
	}else if (vitaE > 10) { $('#vitaE_indic').css('background', 'yellow'); // if greater than min value
	}else if (vitaE <= 10) { $('#vitaE_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#vitaE_indic').css('background', 'white'); }

	var vitaB1 = $("#vitaB1").val();
	if (vitaB1 == 0) { $('#vitaB1_indic').css('background', 'gray'); //if null or 0
	}else if (vitaB1 > 1.125) {	$('#vitaB1_indic').css('background', 'red'); // if greater than max value
	}else if (vitaB1 > 0.75) { $('#vitaB1_indic').css('background', 'yellow'); // if greater than min value
	}else if (vitaB1 <= 0.75) { $('#vitaB1_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#vitaB1_indic').css('background', 'white'); }

	var vitaB2 = $("#vitaB2").val();
	if (vitaB2 == 0) { $('#vitaB2_indic').css('background', 'gray'); //if null or 0
	}else if (vitaB2 > 1.275) {	$('#vitaB2_indic').css('background', 'red'); // if greater than max value
	}else if (vitaB2 > 0.85) { $('#vitaB2_indic').css('background', 'yellow'); // if greater than min value
	}else if (vitaB2 <= 0.85) { $('#vitaB2_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#vitaB2_indic').css('background', 'white'); }

	var vitaB3 = $("#vitaB3").val();
	if (vitaB3 == 0) { $('#vitaB3_indic').css('background', 'gray'); //if null or 0
	}else if (vitaB3 > 15) {	$('#vitaB3_indic').css('background', 'red'); // if greater than max value
	}else if (vitaB3 > 10) { $('#vitaB3_indic').css('background', 'yellow'); // if greater than min value
	}else if (vitaB3 <= 10) { $('#vitaB3_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#vitaB3_indic').css('background', 'white'); }

	var vitaB6 = $("#vitaB6").val();
	if (vitaB6 == 0) { $('#vitaB6_indic').css('background', 'gray'); //if null or 0
	}else if (vitaB6 > 1.5) {	$('#vitaB6_indic').css('background', 'red'); // if greater than max value
	}else if (vitaB6 > 1) { $('#vitaB6_indic').css('background', 'yellow'); // if greater than min value
	}else if (vitaB6 <= 1) { $('#vitaB6_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#vitaB6_indic').css('background', 'white'); }

	var folate = $("#folate").val();
	if (folate == 0) { $('#folate_indic').css('background', 'gray'); //if null or 0
	}else if (folate > 499.5) {	$('#folate_indic').css('background', 'red'); // if greater than max value
	}else if (folate > 333) { $('#folate_indic').css('background', 'yellow'); // if greater than min value
	}else if (folate <= 333) { $('#folate_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#folate_indic').css('background', 'white'); }

	var vitaB12 = $("#vitaB12").val();
	if (vitaB12 == 0) { $('#vitaB12_indic').css('background', 'gray'); //if null or 0
	}else if (vitaB12 > 4.5) {	$('#vitaB12_indic').css('background', 'red'); // if greater than max value
	}else if (vitaB12 > 3) { $('#vitaB12_indic').css('background', 'yellow'); // if greater than min value
	}else if (vitaB12 <= 3) { $('#vitaB12_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#vitaB12_indic').css('background', 'white'); }

	var biotin = $("#biotin").val();
	if (biotin == 0) { $('#biotin_indic').css('background', 'gray'); //if null or 0
	}else if (biotin > 112.5) {	$('#biotin_indic').css('background', 'red'); // if greater than max value
	}else if (biotin > 75) { $('#biotin_indic').css('background', 'yellow'); // if greater than min value
	}else if (biotin <= 75) { $('#biotin_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#biotin_indic').css('background', 'white'); }

	var pantothenic = $("#pantothenic").val();
	if (pantothenic == 0) { $('#pantothenic_indic').css('background', 'gray'); //if null or 0
	}else if (pantothenic > 7.5) {	$('#pantothenic_indic').css('background', 'red'); // if greater than max value
	}else if (pantothenic > 5) { $('#pantothenic_indic').css('background', 'yellow'); // if greater than min value
	}else if (pantothenic <= 5) { $('#pantothenic_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#pantothenic_indic').css('background', 'white'); }

	var calcium = $("#calcium").val();
	if (calcium == 0) { $('#calcium_indic').css('background', 'gray'); //if null or 0
	}else if (calcium > 1000) {	$('#calcium_indic').css('background', 'red'); // if greater than max value
	}else if (calcium > 800) { $('#calcium_indic').css('background', 'yellow'); // if greater than min value
	}else if (calcium <= 800) { $('#calcium_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#calcium_indic').css('background', 'white'); }

	var iron = $("#iron").val();
	if (iron == 0) { $('#iron_indic').css('background', 'gray'); //if null or 0
	}else if (iron > 12) {	$('#iron_indic').css('background', 'red'); // if greater than max value
	}else if (iron > 7.5) { $('#iron_indic').css('background', 'yellow'); // if greater than min value
	}else if (iron <= 7.5) { $('#iron_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#iron_indic').css('background', 'white'); }

	var phosphorus = $("#phosphorus").val();
	if (phosphorus == 0) { $('#phosphorus_indic').css('background', 'gray'); //if null or 0
	}else if (phosphorus > 750) {	$('#phosphorus_indic').css('background', 'red'); // if greater than max value
	}else if (phosphorus > 600) { $('#phosphorus_indic').css('background', 'yellow'); // if greater than min value
	}else if (phosphorus <= 600) { $('#phosphorus_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#phosphorus_indic').css('background', 'white'); }

	var iodine = $("#iodine").val();
	if (iodine == 0) { $('#iodine_indic').css('background', 'gray'); //if null or 0
	}else if (iodine > 120) {	$('#iodine_indic').css('background', 'red'); // if greater than max value
	}else if (iodine > 75) { $('#iodine_indic').css('background', 'yellow'); // if greater than min value
	}else if (iodine <= 75) { $('#iodine_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#iodine_indic').css('background', 'white'); }

	var magnesium = $("#magnesium").val();
	if (magnesium == 0) { $('#magnesium_indic').css('background', 'gray'); //if null or 0
	}else if (magnesium > 362.5) {	$('#magnesium_indic').css('background', 'red'); // if greater than max value
	}else if (magnesium > 290) { $('#magnesium_indic').css('background', 'yellow'); // if greater than min value
	}else if (magnesium <= 290) { $('#magnesium_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#magnesium_indic').css('background', 'white'); }

	var zinc = $("#zinc").val();
	if (zinc == 0) { $('#zinc_indic').css('background', 'gray'); //if null or 0
	}else if (zinc > 12) {	$('#zinc_indic').css('background', 'red'); // if greater than max value
	}else if (zinc > 7.5) { $('#zinc_indic').css('background', 'yellow'); // if greater than min value
	}else if (zinc <= 7.5) { $('#zinc_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#zinc_indic').css('background', 'white'); }

	var selenium = $("#selenium").val();
	if (selenium == 0) { $('#selenium_indic').css('background', 'gray'); //if null or 0
	}else if (selenium > 56) {	$('#selenium_indic').css('background', 'red'); // if greater than max value
	}else if (selenium > 35) { $('#selenium_indic').css('background', 'yellow'); // if greater than min value
	}else if (selenium <= 35) { $('#selenium_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#selenium_indic').css('background', 'white'); }

	var copper = $("#copper").val();
	if (copper == 0) { $('#copper_indic').css('background', 'gray'); //if null or 0
	}else if (copper > 1.28) {	$('#copper_indic').css('background', 'red'); // if greater than max value
	}else if (copper > 0.8) { $('#copper_indic').css('background', 'yellow'); // if greater than min value
	}else if (copper <= 0.8) { $('#copper_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#copper_indic').css('background', 'white'); }

	var manganese = $("#manganese").val();
	if (manganese == 0) { $('#manganese_indic').css('background', 'gray'); //if null or 0
	}else if (manganese > 1.472) {	$('#manganese_indic').css('background', 'red'); // if greater than max value
	}else if (manganese > 0.92) { $('#manganese_indic').css('background', 'yellow'); // if greater than min value
	}else if (manganese <= 0.92) { $('#manganese_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#manganese_indic').css('background', 'white'); }

	var chromium = $("#chromium").val();
	if (chromium == 0) { $('#chromium_indic').css('background', 'gray'); //if null or 0
	}else if (chromium > 56) {	$('#chromium_indic').css('background', 'red'); // if greater than max value
	}else if (chromium > 35) { $('#chromium_indic').css('background', 'yellow'); // if greater than min value
	}else if (chromium <= 35) { $('#chromium_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#chromium_indic').css('background', 'white'); }

	var molybdenum = $("#molybdenum").val();
	if (molybdenum == 0) { $('#molybdenum_indic').css('background', 'gray'); //if null or 0
	}else if (molybdenum > 144) {	$('#molybdenum_indic').css('background', 'red'); // if greater than max value
	}else if (molybdenum > 90) { $('#molybdenum_indic').css('background', 'yellow'); // if greater than min value
	}else if (molybdenum <= 90) { $('#molybdenum_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#molybdenum_indic').css('background', 'white'); }

	var chloride = $("#chloride").val();
	if (chloride == 0) { $('#chloride_indic').css('background', 'gray'); //if null or 0
	}else if (chloride > 462.5) {	$('#chloride_indic').css('background', 'red'); // if greater than max value
	}else if (chloride > 370) { $('#chloride_indic').css('background', 'yellow'); // if greater than min value
	}else if (chloride <= 370) { $('#chloride_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#chloride_indic').css('background', 'white'); }

	var sodium = $("#sodium").val();
	if (sodium == 0) { $('#sodium_indic').css('background', 'gray'); //if null or 0
	}else if (sodium > 593.75) {	$('#sodium_indic').css('background', 'red'); // if greater than max value
	}else if (sodium > 475) { $('#sodium_indic').css('background', 'yellow'); // if greater than min value
	}else if (sodium <= 475) { $('#sodium_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#sodium_indic').css('background', 'white'); }

	var potassium = $("#potassium").val();
	if (potassium == 0) { $('#potassium_indic').css('background', 'gray'); //if null or 0
	}else if (potassium > 687.5) {	$('#potassium_indic').css('background', 'red'); // if greater than max value
	}else if (potassium > 550) { $('#potassium_indic').css('background', 'yellow'); // if greater than min value
	}else if (potassium <= 550) { $('#potassium_indic').css('background', 'green');	 // if less than or equal to the min value
	}else { $('#potassium_indic').css('background', 'white'); }
}

function editmode(k){

	// var protein = [];
	// eval('protein[k] = $("#protein_'+ k +'").val();');
	// if (protein[k] == 0) {	eval('$("#protein_indic_'+ k +'").css("background","gray")');
	// }else if (protein[k] <= 25) { eval('$("#protein_indic_'+ k +'").css("background","green")');
	// }else if (protein[k] > 25) { eval('$("#protein_indic_'+ k +'").css("background","yellow")');
	// }else { eval('$("#protein_indic_'+ k +'").css("background","white")'); }

	// var editphysicaltestingcount = [];
	// eval('editphysicaltestingcount[k] = $("#editphysicaltestingcount'+ k +'").val();');

	// var editchemicaltestingcount = [];
	// eval('editchemicaltestingcount[k] = $("#editchemicaltestingcount'+ k +'").val();');

	// var editheavymetaltestingcount = [];
	// eval('editheavymetaltestingcount[k] = $("#editheavymetaltestingcount'+ k +'").val();');

	// var editmicrobiologicaltestingcount = [];
	// eval('editmicrobiologicaltestingcount[k] = $("#editmicrobiologicaltestingcount'+ k +'").val();');

	// var addwrapper1 = $('.editphysicaltesting'); //Input field wrapper
 //    var addwrapper2 = $('.editchemicaltesting'); //Input field wrapper
 //    var addwrapper3 = $('.editheavymetaltesting'); //Input field wrapper
 //    var addwrapper4 = $('.editmicrobiologicaltesting'); //Input field wrapper

 //    $(addwrapper1).on('click', '.removeeditphysicaltestingButton', function(e){
 //        e.preventDefault();
 //        editphysicaltestingcount[k]--;
 //        document.getElementById("editphysicaltestingcount").value = editphysicaltestingcount[k];
 //    });
 //    $(addwrapper2).on('click', '.removeeditchemicaltestingButton', function(e){
 //        e.preventDefault();
 //        editchemicaltestingcount[k]--;
 //        document.getElementById("editchemicaltestingcount").value = editchemicaltestingcount[k];
 //    });
 //    $(addwrapper3).on('click', '.removeeditheavymetaltestingButton', function(e){
 //        e.preventDefault();
 //        editheavymetaltestingcount[k]--;
 //        document.getElementById("editheavymetaltestingcount").value = editheavymetaltestingcount[k];
 //    });
 //    $(addwrapper4).on('click', '.removeeditmicrobiologicaltestingButton', function(e){
 //        e.preventDefault();
 //        editmicrobiologicaltestingcount[k]--;
 //        document.getElementById("editmicrobiologicaltestingcount").value = editmicrobiologicaltestingcount[k];
 //    });


	// var fieldHTML1 = [];
	// fieldHTML1[k] = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-3"><input type="text" name="editphysicaltest[]" class="form-control"></div><div class="col-md-3"><input type="text" name="editphysicalspecification[]"  class="form-control"></div><div class="col-md-3"><input type="text" name="editphysicalmethod[]"  class="form-control"></div><div class="col-md-2"><input type="text" name="editphysicalresults[]"  class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditphysicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>';
	// var fieldHTML2 = [];
	// fieldHTML2[k] = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-5"><input class="form-control"  type="text" name="editchemicaltest[]"></div><div class="col-md-2"><input class="form-control"  type="text" name="editchemicalunit[]"></div><div class="col-md-1"><input class="form-control"  type="text" name="editchemicalmin[]"></div><div class="col-md-1"><input class="form-control"  type="text" name="editchemicalmax[]"></div><div class="col-md-2"><input class="form-control"  type="text" name="editchemicalinput[]" id="vitaAsample" oninput="dispresults()"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditchemicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>';
	// var fieldHTML3 = [];
	// fieldHTML3[k] = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-5"><input  class="form-control" type="text" name="editheavymetaltest[]"></div><div class="col-md-4"><input  class="form-control" type="text" name="editheavymetalug[]"></div><div class="col-md-2"><input  class="form-control" type="text" name="editheavymetalinput[]"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditheavymetaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>';
	// var fieldHTML4 = [];
	// fieldHTML4[k] = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-5"><input  class="form-control" type="text" name="editmicrobiologicaltest[]"></div><div class="col-md-4"><input  class="form-control" type="text" name="editmicrobiologicalcfu[]"></div><div class="col-md-2"><input  class="form-control" type="text" name="editmicrobiologicalinput[]"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditmicrobiologicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>';
 //    var addwrapper1 = [];
 //    eval('addwrapper1[k] = $(".editphysicaltesting'+k+'");'); //Input field wrapper
 //    var addwrapper2 = [];
 //    eval('addwrapper2[k] = $(".editchemicaltesting'+k+'");'); //Input field wrapper
 //    var addwrapper3 = [];
 //    eval('addwrapper3[k] = $(".editheavymetaltesting'+k+'");'); //Input field wrapper
 //    var addwrapper4 = [];
 //    eval('addwrapper4[k] = $(".editmicrobiologicaltesting'+k+'");'); //Input field wrapper

 //    $(addButton1[k]).click(function(){
 //        //Check maximum number of input fields
 //        $(addwrapper1[k]).append(fieldHTML1[k]); //Add field html
 //        editphysicaltestingcount[k]++;
 //        eval('document.getElementById("editphysicaltestingcount[k]").value = editphysicaltestingcount;');
 //    });
 //    $(addButton2[k]).click(function(){
 //        //Check maximum number of input fields
 //        $(addwrapper2[k]).append(fieldHTML2[k]); //Add field html
 //        editchemicaltestingcount[k]++;
 //        eval('document.getElementById("editchemicaltestingcount[k]").value = editchemicaltestingcount;');
 //    });
 //    $(addButton3[k]).click(function(){
 //        //Check maximum number of input fields
 //        $(addwrapper3[k]).append(fieldHTML3[k]); //Add field html
 //        editheavymetaltestingcount[k]++;
 //        eval('document.getElementById("editheavymetaltestingcount[k]").value = editheavymetaltestingcount;');
 //    });
 //    $(addButton4[k]).click(function(){
 //        //Check maximum number of input fields
 //        $(addwrapper4[k]).append(fieldHTML4[k]); //Add field html
 //        editmicrobiologicaltestingcount[k]++;
 //        eval('document.getElementById("editmicrobiologicaltestingcount[k]").value = editmicrobiologicaltestingcount;');
 //    });

 //    $(addwrapper1[k]).on('click', '.removeeditphysicaltestingButton', function(e){
 //        e.preventDefault();
 //        $(this).parent('div').parent('div').remove(); //Remove field html
 //        editphysicaltestingcount[k]--;
 //        eval('document.getElementById("editphysicaltestingcount[k]").value = editphysicaltestingcount;');
 //    });
 //    $(addwrapper2[k]).on('click', '.removeeditchemicaltestingButton', function(e){
 //        e.preventDefault();
 //        $(this).parent('div').parent('div').remove(); //Remove field html
 //        editchemicaltestingcount[k]--;
 //        eval('document.getElementById("editchemicaltestingcount[k]").value = editchemicaltestingcount;');
 //    });
 //    $(addwrapper3[k]).on('click', '.removeeditheavymetaltestingButton', function(e){
 //        e.preventDefault();
 //        $(this).parent('div').parent('div').remove(); //Remove field html
 //        editheavymetaltestingcount[k]--;
 //        eval('document.getElementById("editheavymetaltestingcount[k]").value = editheavymetaltestingcount;');
 //    });
 //    $(addwrapper4[k]).on('click', '.removeeditmicrobiologicaltestingButton', function(e){
 //        e.preventDefault();
 //        $(this).parent('div').parent('div').remove(); //Remove field html
 //        editmicrobiologicaltestingcount[k]--;
 //        eval('document.getElementById("editmicrobiologicaltestingcount[k]").value = editmicrobiologicaltestingcount;');
 //    });
}

$(document).ready(function(){
   	
   	var addphysicaltestingcount = $("#addphysicaltestingcount").val();
   	var addchemicaltestingcount = $("#addchemicaltestingcount").val();
   	var addheavymetaltestingcount = $("#addheavymetaltestingcount").val();
   	var addmicrobiologicaltestingcount = $("#addmicrobiologicaltestingcount").val();
   	
   	var editphysicaltestingcount = $("#editphysicaltestingcount").val();
   	var editchemicaltestingcount = $("#editchemicaltestingcount").val();
   	var editheavymetaltestingcount = $("#editheavymetaltestingcount").val();
   	var editmicrobiologicaltestingcount = $("#editmicrobiologicaltestingcount").val();

    var addButton1 = $('.addpreparedButton'); //Add button selector
    var addButton2 = $('.addreviewedButton'); //Add button selector
    var addButton3 = $('.addapprovedButton'); //Add button selector
    var addButton4 = $('.addauthorizedButton'); //Add button selector
    var addButton5 = $('.addeditpreparedButton'); //Add button selector
    var addButton6 = $('.addeditreviewedButton'); //Add button selector
    var addButton7 = $('.addeditapprovedButton'); //Add button selector
    var addButton8 = $('.addeditauthorizedButton'); //Add button selector

	var addButton9 = $('.addphysicaltestingButton'); //Add button selector
	var addButton10 = $('.addchemicaltestingButton'); //Add button selector
	var addButton11 = $('.addheavymetaltestingButton'); //Add button selector
	var addButton12 = $('.addmicrobiologicaltestingButton'); //Add button selector
	var addButton13 = $('.addeditphysicaltestingButton'); //Add button selector
	var addButton14 = $('.addeditchemicaltestingButton'); //Add button selector
	var addButton15 = $('.addeditheavymetaltestingButton'); //Add button selector
	var addButton16 = $('.addeditmicrobiologicaltestingButton'); //Add button selector

    var addwrapper1 = $('.addprepared'); //Input field wrapper
    var addwrapper2 = $('.addreviewed'); //Input field wrapper
    var addwrapper3 = $('.addapproved'); //Input field wrapper
    var addwrapper4 = $('.addauthorized'); //Input field wrapper
    var addwrapper5 = $('.editprepared'); //Input field wrapper
    var addwrapper6 = $('.editreviewed'); //Input field wrapper
    var addwrapper7 = $('.editapproved'); //Input field wrapper
    var addwrapper8 = $('.editauthorized'); //Input field wrapper
    
    var addwrapper9 = $('.addphysicaltesting'); //Input field wrapper
    var addwrapper10 = $('.addchemicaltesting'); //Input field wrapper
    var addwrapper11 = $('.addheavymetaltesting'); //Input field wrapper
    var addwrapper12 = $('.addmicrobiologicaltesting'); //Input field wrapper

    var addwrapper13 = $('.editphysicaltesting'); //Input field wrapper
    var addwrapper14 = $('.editchemicaltesting'); //Input field wrapper
    var addwrapper15 = $('.editheavymetaltesting'); //Input field wrapper
    var addwrapper16 = $('.editmicrobiologicaltesting'); //Input field wrapper
	    

	var fieldHTML1 = '<div class="row" id="prepared" style="padding-top: 5px; padding-bottom: 5px;"><div class="col-md-5"><input type="text" name="addpreparedname[]" class="form-control"></div><div class="col-md-6"><input type="text" name="addprepareddescription[]" class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removepreparedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML2 = '<div class="row" style="padding-top: 5px; padding-bottom: 5px;"><div class="col-md-5"><input type="text" name="addreviewedname[]" class="form-control"></div><div class="col-md-6"><input type="text" name="addreviewddescription[]" class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removereviewedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML3 = '<div class="row" style="padding-top: 5px; padding-bottom: 5px;"><div class="col-md-5"><input type="text" name="addapprovedname[]" class="form-control"></div><div class="col-md-6"><input type="text" name="addapproveddescription[]" class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeapprovedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML4 = '<div class="row" style="padding-top: 5px; padding-bottom: 5px;"><div class="col-md-5"><input type="text" name="addauthorizedname[]" class="form-control"></div><div class="col-md-6"><input type="text" name="addauthorizeddescription[]" class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeauthorizedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML5 = '<div class="row" style="padding-top: 5px; padding-bottom: 5px;"><div class="col-md-5"><input type="text" name="editpreparedname[]" class="form-control"></div><div class="col-md-6"><input type="text" name="editprepareddescription[]" class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditpreparedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML6 = '<div class="row" style="padding-top: 5px; padding-bottom: 5px;"><div class="col-md-5"><input type="text" name="editreviewedname[]" class="form-control"></div><div class="col-md-6"><input type="text" name="editrevieweddescription[]" class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditreviewedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML7 = '<div class="row" style="padding-top: 5px; padding-bottom: 5px;"><div class="col-md-5"><input type="text" name="editapprovedname[]" class="form-control"></div><div class="col-md-6"><input type="text" name="editapproveddescription[]" class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditapprovedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML8 = '<div class="row" style="padding-top: 5px; padding-bottom: 5px;"><div class="col-md-5"><input type="text" name="editauthorizedname[]" class="form-control"></div><div class="col-md-6"><input type="text" name="editauthorizeddescription[]" class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditauthorizedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
    
    var fieldHTML9 = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-3"><input type="text" name="addphysicaltest[]" class="form-control"></div><div class="col-md-3"><input type="text" name="addphysicalspecification[]"  class="form-control"></div><div class="col-md-3"><input type="text" name="addphysicalmethod[]"  class="form-control"></div><div class="col-md-2"><input type="text" name="addphysicalresults[]"  class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removephysicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML10 = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-6"><input class="form-control"  type="text" name="addchemicaltest[]"></div><div class="col-md-1"><input class="form-control"  type="text" name="addchemicalunit[]"></div><div class="col-md-1"><input class="form-control"  type="text" name="addchemicalmin[]"></div><div class="col-md-1"><input class="form-control"  type="text" name="addchemicalmax[]"></div><div class="col-md-2"><input class="form-control"  type="text" name="addchemicalinput[]"></div><div class="col-md-1"><a href="javascript:void(0);" class="removechemicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML11 = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-5"><input  class="form-control" type="text" name="addheavymetaltest[]"></div><div class="col-md-4"><input  class="form-control" type="text" name="addheavymetalug[]"></div><div class="col-md-2"><input  class="form-control" type="text" name="addheavymetalinput[]"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeheavymetaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML12 = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-5"><input  class="form-control" type="text" name="addmicrobiologicaltest[]"></div><div class="col-md-4"><input  class="form-control" type="text" name="addmicrobiologicalcfu[]"></div><div class="col-md-2"><input  class="form-control" type="text" name="addmicrobiologicalinput[]"></div><div class="col-md-1"><a href="javascript:void(0);" class="removemicrobiologicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML13 = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-3"><input type="text" name="editphysicaltest[]" class="form-control"></div><div class="col-md-3"><input type="text" name="editphysicalspecification[]"  class="form-control"></div><div class="col-md-3"><input type="text" name="editphysicalmethod[]"  class="form-control"></div><div class="col-md-2"><input type="text" name="editphysicalresults[]"  class="form-control"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditphysicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML14 = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-6"><input class="form-control"  type="text" name="editchemicaltest[]"></div><div class="col-md-1"><input class="form-control"  type="text" name="editchemicalunit[]"></div><div class="col-md-1"><input class="form-control"  type="text" name="editchemicalmin[]"></div><div class="col-md-1"><input class="form-control"  type="text" name="editchemicalmax[]"></div><div class="col-md-2"><input class="form-control"  type="text" name="editchemicalinput[]"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditchemicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML15 = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-5"><input  class="form-control" type="text" name="editheavymetaltest[]"></div><div class="col-md-4"><input  class="form-control" type="text" name="editheavymetalug[]"></div><div class="col-md-2"><input  class="form-control" type="text" name="editheavymetalinput[]"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditheavymetaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
	var fieldHTML16 = '<div class="row" style="padding-top: 2px;padding-bottom: 2px;"><div class="col-md-5"><input  class="form-control" type="text" name="editmicrobiologicaltest[]"></div><div class="col-md-4"><input  class="form-control" type="text" name="editmicrobiologicalcfu[]"></div><div class="col-md-2"><input  class="form-control" type="text" name="editmicrobiologicalinput[]"></div><div class="col-md-1"><a href="javascript:void(0);" class="removeeditmicrobiologicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a></div></div>'; //New input field html 
    

    //Once add button is clicked
    $(addButton1).click(function(){
        //Check maximum number of input fields
        $(addwrapper1).append(fieldHTML1); //Add field html
    });
    $(addButton2).click(function(){
        //Check maximum number of input fields
        $(addwrapper2).append(fieldHTML2); //Add field html
    });
    $(addButton3).click(function(){
        //Check maximum number of input fields
        $(addwrapper3).append(fieldHTML3); //Add field html
    });
    $(addButton4).click(function(){
        //Check maximum number of input fields
        $(addwrapper4).append(fieldHTML4); //Add field html
    });
    $(addButton5).click(function(){
        //Check maximum number of input fields
        $(addwrapper5).append(fieldHTML5); //Add field html
    });
    $(addButton6).click(function(){
        //Check maximum number of input fields
        $(addwrapper6).append(fieldHTML6); //Add field html
    });
    $(addButton7).click(function(){
        //Check maximum number of input fields
        $(addwrapper7).append(fieldHTML7); //Add field html
    });
    $(addButton8).click(function(){
        //Check maximum number of input fields
        $(addwrapper8).append(fieldHTML8); //Add field html
    });

    $(addButton9).click(function(){
        //Check maximum number of input fields
        $(addwrapper9).append(fieldHTML9); //Add field html
        addphysicaltestingcount++;
        document.getElementById("addphysicaltestingcount").value = addphysicaltestingcount;
    });
    $(addButton10).click(function(){
        //Check maximum number of input fields
        $(addwrapper10).append(fieldHTML10); //Add field html
        addchemicaltestingcount++;
        document.getElementById("addchemicaltestingcount").value = addchemicaltestingcount;
    });
    $(addButton11).click(function(){
        //Check maximum number of input fields
        $(addwrapper11).append(fieldHTML11); //Add field html
        addheavymetaltestingcount++;
        document.getElementById("addheavymetaltestingcount").value = addheavymetaltestingcount;
    });
    $(addButton12).click(function(){
        //Check maximum number of input fields
        $(addwrapper12).append(fieldHTML12); //Add field html
        addmicrobiologicaltestingcount++;
        document.getElementById("addmicrobiologicaltestingcount").value = addmicrobiologicaltestingcount;
    });
    $(addButton13).click(function(){
        //Check maximum number of input fields
        $(addwrapper13).append(fieldHTML13); //Add field html
        // editphysicaltestingcount++;
        // document.getElementById("editphysicaltestingcount").value = editphysicaltestingcount;
    });
    $(addButton14).click(function(){
        //Check maximum number of input fields
        $(addwrapper14).append(fieldHTML14); //Add field html
        // editchemicaltestingcount++;
        // document.getElementById("editchemicaltestingcount").value = editchemicaltestingcount;
    });
    $(addButton15).click(function(){
        //Check maximum number of input fields
        $(addwrapper15).append(fieldHTML15); //Add field html
        // editheavymetaltestingcount++;
        // document.getElementById("editheavymetaltestingcount").value = editheavymetaltestingcount;
    });
    $(addButton16).click(function(){
        //Check maximum number of input fields
        $(addwrapper16).append(fieldHTML16); //Add field html
        // editmicrobiologicaltestingcount++;
        // document.getElementById("editmicrobiologicaltestingcount").value = editmicrobiologicaltestingcount;
    });

    $(addwrapper1).on('click', '.removepreparedButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
    });
    $(addwrapper2).on('click', '.removereviewedButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
    });
    $(addwrapper3).on('click', '.removeapprovedButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
    });
    $(addwrapper4).on('click', '.removeauthorizedButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
    });
    $(addwrapper5).on('click', '.removeeditpreparedButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
    });
    $(addwrapper6).on('click', '.removeeditreviewedButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
    });
    $(addwrapper7).on('click', '.removeeditapprovedButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
    });
    $(addwrapper8).on('click', '.removeeditauthorizedButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
    });

    $(addwrapper9).on('click', '.removephysicaltestingButton', function(e){
        e.preventDefault();
        //$('#newphysicaltesting').remove();
        $(this).parent('div').parent('div').remove(); //Remove field html
        addphysicaltestingcount--;
        document.getElementById("addphysicaltestingcount").value = addphysicaltestingcount;
    });
    $(addwrapper10).on('click', '.removechemicaltestingButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        addchemicaltestingcount--;
        document.getElementById("addchemicaltestingcount").value = addchemicaltestingcount;
    });
    $(addwrapper11).on('click', '.removeheavymetaltestingButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        addheavymetaltestingcount--;
        document.getElementById("addheavymetaltestingcount").value = addheavymetaltestingcount;
    });
    $(addwrapper12).on('click', '.removemicrobiologicaltestingButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        addmicrobiologicaltestingcount--;
        document.getElementById("addmicrobiologicaltestingcount").value = addmicrobiologicaltestingcount;
    });
    $(addwrapper13).on('click', '.removeeditphysicaltestingButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        // editphysicaltestingcount--;
        // document.getElementById("editphysicaltestingcount").value = editphysicaltestingcount;
    });
    $(addwrapper14).on('click', '.removeeditchemicaltestingButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        // editchemicaltestingcount--;
        // document.getElementById("editchemicaltestingcount").value = editchemicaltestingcount;
    });
    $(addwrapper15).on('click', '.removeeditheavymetaltestingButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        // editheavymetaltestingcount--;
        // document.getElementById("editheavymetaltestingcount").value = editheavymetaltestingcount;
    });
    $(addwrapper16).on('click', '.removeeditmicrobiologicaltestingButton', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        // editmicrobiologicaltestingcount--;
        // document.getElementById("editmicrobiologicaltestingcount").value = editmicrobiologicaltestingcount;
    });

    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
