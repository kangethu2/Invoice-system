<?php include ('session.php');?>
<?php  include_once 'header.php'; ?>
<head>
<div class="col-md-12 well">
    <div class="container">
      <?php
          $invoiceNo = $_GET['invoiceNo'];
          ?>
          <?php include ('connect.php');
                               $query = mysql_query("select * from sales where invoiceNo='$invoiceNo'") or die(mysql_error());
                               $row = mysql_fetch_array($query);
              ?>
<br><br>
        <form method="post" action="generateinvoice.php"  enctype="multipart/form-data">
           <br>
            <!--

                                <h3><font size="+3" color="blue"> <?php echo $row['company']; ?></font></h3>

                                <br>
                                <h5><font size="+2" color="blue"> <?php echo $row['service']; ?></font></h5>


                            <br><br>
                  -->
                                <br>

<?php include ('connect.php');
    $query = mysql_query("select * from sales where invoiceNo='$invoiceNo'") or die(mysql_error());
    $row = mysql_fetch_array($query);
    ?>
         <div class="row">
                                   <div>
                                       <div>
                                        <div class="form-group">
                                           <label >Is the supply delivered?  &nbsp &nbsp </label><br>
                                         Yes. &nbsp <input required="required"  type="checkbox" name="deliveryStatus" value="Delivered" style="zoom:1.5; vertical-align: middle; horizontal-align: middle; margin: 0px;" >
                                       </div>
                                   </div>
                                 </div>
                          <input   type="hidden" name="date1" >
                          <br>
                         <input   type="hidden" name="invoiceNo" class="form-control" required="required"  value="<?php echo $row['invoiceNo']; ?>">


                          <br>
                        <!--  <input   type="hidden" name="deliveryStatus"  value="Delivered">  -->
                          <br>

<!--<button   type="submit" name="go" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>  -->
<button   type="submit" name="go" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Submit</button>
<span><a href = "home.php" class = "btn btn-danger"> Back</a></span>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
</div>
</div>
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<!-- javascreept condition -->
<!--  Fitting script-->

<script type="text/javascript" src="js/jquery.js"></script>



<script>
var $ = jQuery;
$(document).ready(function() {
    var target = $('#mFitting').closest('div').hide(),
		holder = $('#id_application_method_mFitting');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mFitting').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>




<!--<script>
$(window).on("load",function() {
    var selectables = $('select');//.closest('div').hide();
    //console.log(selectables);


    for ( i = 0; i<selectables.length; i++){

      var choiceId = selectables[i].id;
	  //var sibStr = '#'+choiceId;
	  //console.log($(sibStr).nextAll());
	  //var sibs = $(sibStr).siblings();
	  //var sibs = $(sibStr).siblings("select[multiple='multiple']:first");
	  //var target = sibs.id;
      var par = $('#'+choiceId).parents('.row');
	  console.log(par);
	  debugger;
	  var target = par.find("select:last");//('.col-md-6 col-sm-6');

		//console.log(target);

        if(selectables[i].value === 'Unacceptable'){

            //$(this).next('select').show();

            //console.log($(choice).next("div .col-md-6 col-sm-6"));
            $('#'+target).show();//css("color","green");
            //.show();
            //$("div").children("p.first");
            //nextdiv = $('choice').next('div');
            //console.log(nextdiv)
        } else {
            $('#'+target).hide();
        }

    }
    /*$('#id_application_method_mFitting').on("load", function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            unacceptable.show();
        } else {
            unacceptable.hide();
        }
    });*/

});

</script>
-->
 <script>
function checkFilledmFitting() {
	var inputVal = document.getElementById("id_application_method_mFitting");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
    if (inputVal.value == "Unacceptable") {
    	document.getElementById("mFitting").required = true;
    	}
    	else {
    	document.getElementById("mFitting").required = false;
    	}
}

checkFilledmFitting();
</script>
 <script>
function checkFilledmFittingOptions() {
	var inputVal = document.getElementById("mFitting");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmFittingOptions();

</script>
 <script>
$(document).ready(function() {
    var target = $('#mphysicalOptions').closest('div').hide(),
		holder = $('#id_application_method_mphysical');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mphysical').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmphysical() {
	var inputVal = document.getElementById("id_application_method_mphysical");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
        if (inputVal.value == "Unacceptable") {
    	document.getElementById("mphysicalOptions").required = true;
    	}
    	else {
    	document.getElementById("mphysicalOptions").required = false;
    	}
}

checkFilledmphysical();
</script>
<script>
function checkFilledmphysicalOptions() {
	var inputVal = document.getElementById("mphysicalOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmphysicalOptions();

</script>
<script>

$(document).ready(function() {
    var target = $('#mPlayOptions').closest('div').hide(),
		holder = $('#id_application_method_mPlay');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mPlay').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmPlay() {
	var inputVal = document.getElementById("id_application_method_mPlay");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
    if (inputVal.value == "Unacceptable") {
    	document.getElementById("mPlayOptions").required = true;
    	}
    	else {
    	document.getElementById("mPlayOptions").required = false;
    	}
}

checkFilledmPlay();
</script>
<script>
function checkFilledmPlayOptions() {
	var inputVal = document.getElementById("mPlayOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmPlayOptions();

</script>
<script>

$(document).ready(function() {
    var target = $('#mGearOptions').closest('div').hide(),
		holder = $('#id_application_method_mGear');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mGear').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmGear() {
	var inputVal = document.getElementById("id_application_method_mGear");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mGearOptions").required = true;
    	}
    	else {
    	document.getElementById("mGearOptions").required = false;
    	}
}

checkFilledmGear();
</script>
<script>
function checkFilledmGearOptions() {
	var inputVal = document.getElementById("mGearOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmGearOptions();
</script>
<script>

$(document).ready(function() {
    var target = $('#mFootOptions').closest('div').hide(),
		holder = $('#id_application_method_mFoot');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mFoot').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmFoot() {
	var inputVal = document.getElementById("id_application_method_mFoot");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mFootOptions").required = true;
    	}
    	else {
    	document.getElementById("mFootOptions").required = false;
    	}
}

checkFilledmFoot();
</script>
<script>
function checkFilledmFootOptions() {
	var inputVal = document.getElementById("mFootOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmFootOptions();

</script>
<script>
$(document).ready(function() {
    var target = $('#mHandOptions').closest('div').hide(),
		holder = $('#id_application_method_mHand');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mHand').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmHand() {
	var inputVal = document.getElementById("id_application_method_mHand");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mHandOptions").required = true;
    	}
    	else {
    	document.getElementById("mHandOptions").required = false;
    	}
}

checkFilledmHand();
</script>
<script>
function checkFilledmHandOptions() {
	var inputVal = document.getElementById("mHandOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmHandOptions();

</script>
<script>
$(document).ready(function() {
    var target = $('#mEngineOptions').closest('div').hide(),
		holder = $('#id_application_method_mEngine');
		if(holder.val() === 'Yes'){
			target.show();
		}

    $('#id_application_method_mEngine').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Yes') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmEngine() {
	var inputVal = document.getElementById("id_application_method_mEngine");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mEngineOptions").required = true;
    	}
    	else {
    	document.getElementById("mEngineOptions").required = false;
    	}
}

checkFilledmEngine();
</script>
<script>
function checkFilledmEngineOptions() {
	var inputVal = document.getElementById("mEngineOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmEngineOptions();
</script>
<script>
$(document).ready(function() {
    var target = $('#mTyreFLOptions').closest('div').hide(),
		holder = $('#id_application_method_mTyreFL');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mTyreFL').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmTyreFL() {
	var inputVal = document.getElementById("id_application_method_mTyreFL");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mTyreFLOptions").required = true;
    	}
    	else {
    	document.getElementById("mTyreFLOptions").required = false;
    	}
}

checkFilledmTyreFL();
</script>
<script>
function checkFilledmTyreFLDepth() {
	var inputVal = document.getElementById("mTyreFLDepth");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreFLDepth();
</script>
<script>
function checkFilledmTyreFLOptions() {
	var inputVal = document.getElementById("mTyreFLOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreFLOptions();
</script>
<script>

$(document).ready(function() {
    var target = $('#mTyreFROptions').closest('div').hide(),
		holder = $('#id_application_method_mTyreFR');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mTyreFR').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmTyreFR() {
	var inputVal = document.getElementById("id_application_method_mTyreFR");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mTyreFROptions").required = true;
    	}
    	else {
    	document.getElementById("mTyreFROptions").required = false;
    	}
}

checkFilledmTyreFR();
</script>
<script>
function checkFilledmTyreFRDepth() {
	var inputVal = document.getElementById("mTyreFRDepth");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreFRDepth();
</script>
<script>
function checkFilledmTyreFROptions() {
	var inputVal = document.getElementById("mTyreFROptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreFROptions();
</script>
<script>
$(document).ready(function() {
    var target = $('#mTyreRROptions').closest('div').hide(),
		holder = $('#id_application_method_mTyreRR');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mTyreRR').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>

function checkFilledmTyreRR() {
	var inputVal = document.getElementById("id_application_method_mTyreRR");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mTyreRROptions").required = true;
    	}
    	else {
    	document.getElementById("mTyreRROptions").required = false;
    	}
}

checkFilledmTyreRR();
</script>
<script>
function checkFilledmTyreRRDepth() {
	var inputVal = document.getElementById("mTyreRRDepth");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreRRDepth();
</script>
<script>
function checkFilledmTyreRROptions() {
	var inputVal = document.getElementById("mTyreRROptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreRROptions();

</script>
<script>
$(document).ready(function() {
    var target = $('#mTyreRLOptions').closest('div').hide(),
		holder = $('#id_application_method_mTyreRL');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mTyreRL').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmTyreRL() {
	var inputVal = document.getElementById("id_application_method_mTyreRL");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mTyreRLOptions").required = true;
    	}
    	else {
    	document.getElementById("mTyreRLOptions").required = false;
    	}
}

checkFilledmTyreRL();
</script>
<script>
function checkFilledmTyreRLDepth() {
	var inputVal = document.getElementById("mTyreRLDepth");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreRLDepth();
</script>
<script>
function checkFilledmTyreRLOptions() {
	var inputVal = document.getElementById("mTyreRLOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreRLOptions();
</script>
<script>

$(document).ready(function() {
    var target = $('#mTyreSOptions').closest('div').hide(),
		holder = $('#id_application_method_mTyreS');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mTyreS').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmTyreS() {
	var inputVal = document.getElementById("id_application_method_mTyreS");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mTyreSOptions").required = true;
    	}
    	else {
    	document.getElementById("mTyreSOptions").required = false;
    	}
}

checkFilledmTyreS();
</script>
<script>
function checkFilledmTyreSDepth() {
	var inputVal = document.getElementById("mTyreSDepth");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreSDepth();
</script>
<script>
function checkFilledmTyreSOptions() {
	var inputVal = document.getElementById("mTyreSOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmTyreSOptions();

</script>
<script>

$(document).ready(function() {
    var target = $('#mLightHOptions').closest('div').hide(),
		holder = $('#id_application_method_mLightH');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mLightH').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmLightH() {
	var inputVal = document.getElementById("id_application_method_mLightH");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
        if (inputVal.value == "Unacceptable") {
    	document.getElementById("mLightHOptions").required = true;
    	}
    	else {
    	document.getElementById("mLightHOptions").required = false;
    	}
}

checkFilledmLightH();
</script>
<script>
function checkFilledmLightHOptions() {
	var inputVal = document.getElementById("mLightHOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmLightHOptions();
</script>
<script>
$(document).ready(function() {
    var target = $('#mLightBOptions').closest('div').hide(),
		holder = $('#id_application_method_mLightB');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mLightB').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmLightB() {
	var inputVal = document.getElementById("id_application_method_mLightB");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mLightBOptions").required = true;
    	}
    	else {
    	document.getElementById("mLightBOptions").required = false;
    	}

}

checkFilledmLightB();
</script>
<script>
function checkFilledmLightBOptions() {
	var inputVal = document.getElementById("mLightBOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmLightBOptions();

</script>
<script>

$(document).ready(function() {
    var target = $('#mLightIOptions').closest('div').hide(),
		holder = $('#id_application_method_mLightI');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mLightI').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmLightI() {
	var inputVal = document.getElementById("id_application_method_mLightI");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mLightIOptions").required = true;
    	}
    	else {
    	document.getElementById("mLightIOptions").required = false;
    	}

}

checkFilledmLightI();
</script>
<script>
function checkFilledmLightIOptions() {
	var inputVal = document.getElementById("mLightIOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmLightIOptions();

</script>
<script>
$(document).ready(function() {
    var target = $('#mLightPOptions').closest('div').hide(),
		holder = $('#id_application_method_mLightP');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mLightP').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmLightP() {
	var inputVal = document.getElementById("id_application_method_mLightP");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mLightPOptions").required = true;
    	}
    	else {
    	document.getElementById("mLightPOptions").required = false;
    	}

}

checkFilledmLightP();
</script>
<script>
function checkFilledmLightPOptions() {
	var inputVal = document.getElementById("mLightPOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmLightPOptions();
</script>
<script>


$(document).ready(function() {
    var target = $('#mLightTOptions').closest('div').hide(),
		holder = $('#id_application_method_mLightT');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mLightT').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmLightT() {
	var inputVal = document.getElementById("id_application_method_mLightT");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mLightTOptions").required = true;
    	}
    	else {
    	document.getElementById("mLightTOptions").required = false;
    	}

}

checkFilledmLightT();
</script>
<script>
function checkFilledmLightTOptions() {
	var inputVal = document.getElementById("mLightTOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmLightTOptions();
</script>
<script>
$(document).ready(function() {
    var target = $('#mLightROptions').closest('div').hide(),
		holder = $('#id_application_method_mLightR');
		if(holder.val() === 'Unacceptable'){
			target.show();
		}

    $('#id_application_method_mLightR').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Unacceptable') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmLightR() {
	var inputVal = document.getElementById("id_application_method_mLightR");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mLightROptions").required = true;
    	}
    	else {
    	document.getElementById("mLightROptions").required = false;
    	}

}

checkFilledmLightR();
</script>
<script>
function checkFilledmLightROptions() {
	var inputVal = document.getElementById("mLightROptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmLightROptions();
</script>
<script>

$(document).ready(function() {
    var target = $('#mLightWCOptions').closest('div').hide(),
		holder = $('#id_application_method_mLightWC');
		if(holder.val() === 'Yes'){
			target.show();
		}

    $('#id_application_method_mLightWC').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'Yes') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmLightWC() {
	var inputVal = document.getElementById("id_application_method_mLightWC");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mLightWCOptions").required = true;
    	}
    	else {
    	document.getElementById("mLightWCOptions").required = false;
    	}

}

checkFilledmLightWC();
</script>
<script>
function checkFilledmLightWCOptions() {
	var inputVal = document.getElementById("mLightWCOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmLightWCOptions();

</script>
<script>
$(document).ready(function() {
    var target = $('#mWiperOptions').closest('div').hide(),
		holder = $('#id_application_method_mWiper');
		if(holder.val() === 'No'){
			target.show();
		}

    $('#id_application_method_mWiper').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'No') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmWiper() {
	var inputVal = document.getElementById("id_application_method_mWiper");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mWiperOptions").required = true;
    	}
    	else {
    	document.getElementById("mWiperOptions").required = false;
    	}

}

checkFilledmWiper();
</script>
<script>
function checkFilledmWiperOptions() {
	var inputVal = document.getElementById("mWiperOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmWiperOptions();

</script>
<script>
$(document).ready(function() {
    var target = $('#mScreenOptions').closest('div').hide(),
		holder = $('#id_application_method_mScreen');
		if(holder.val() === 'No'){
			target.show();
		}

    $('#id_application_method_mScreen').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'No') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmScreen() {
	var inputVal = document.getElementById("id_application_method_mScreen");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mScreenOptions").required = true;
    	}
    	else {
    	document.getElementById("mScreenOptions").required = false;
    	}

}

checkFilledmScreen();
</script>
<script>
function checkFilledmScreenOptions() {
	var inputVal = document.getElementById("mScreenOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmScreenOptions();

</script>
<script>

$(document).ready(function() {
    var target = $('#mLocksOptions').closest('div').hide(),
		holder = $('#id_application_method_mLocks');
		if(holder.val() === 'No'){
			target.show();
		}

    $('#id_application_method_mLocks').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'No') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmLocks() {
	var inputVal = document.getElementById("id_application_method_mLocks");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mLocksOptions").required = true;
    	}
    	else {
    	document.getElementById("mLocksOptions").required = false;
    	}

}

checkFilledmLocks();
</script>
<script>
function checkFilledmLocksOptions() {
	var inputVal = document.getElementById("mLocksOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmLocksOptions();
</script>
<script>

$(document).ready(function() {
    var target = $('#mMirrorsOptions').closest('div').hide(),
		holder = $('#id_application_method_mMirrors');
		if(holder.val() === 'No'){
			target.show();
		}

    $('#id_application_method_mMirrors').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'No') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmMirrors() {
	var inputVal = document.getElementById("id_application_method_mMirrors");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mMirrorsOptions").required = true;
    	}
    	else {
    	document.getElementById("mMirrorsOptions").required = false;
    	}

}

checkFilledmMirrors();
</script>
<script>
function checkFilledmMirrorsOptions() {
	var inputVal = document.getElementById("mMirrorsOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmMirrorsOptions();
</script>
<script>
$(document).ready(function() {
    var target = $('#mFenderOptions').closest('div').hide(),
		holder = $('#id_application_method_mFender');
		if(holder.val() === 'No'){
			target.show();
		}

    $('#id_application_method_mFender').change(function() {
        var selectedValue = $(this).val();

        if(selectedValue  === 'No') {
            target.show();
        } else {
            target.hide();
        }
    });
});
</script>
<script>
function checkFilledmFender() {
	var inputVal = document.getElementById("id_application_method_mFender");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
            if (inputVal.value == "Unacceptable") {
    	document.getElementById("mFenderOptions").required = true;
    	}
    	else {
    	document.getElementById("mFenderOptions").required = false;
    	}

}

checkFilledmFender();
</script>
<script>
function checkFilledmFenderOptions() {
	var inputVal = document.getElementById("mFenderOptions");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else {
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmFenderOptions();

</script>
<script>

function checkFilledpolicyNo() {
	var inputVal = document.getElementById("id_application_method_policyNo");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledpolicyNo();


</script>
<script>

function checkFilledname() {
	var inputVal = document.getElementById("id_application_method_name");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledname();


</script>

<script>
function checkFilledodo() {
	var inputVal = document.getElementById("id_application_method_odo");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledodo();
</script>

<script>
function checkFilledmobile() {
	var inputVal = document.getElementById("id_application_method_mobile");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmobile();
</script>

<script>
function checkFilledemail() {
	var inputVal = document.getElementById("id_application_method_email");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledemail();
</script>

<script>
function checkFilledid() {
	var inputVal = document.getElementById("id_application_method_id");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledid();
</script>

<script>
function checkFilledmake() {
	var inputVal = document.getElementById("id_application_method_make");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmake();
</script>


<script>
function checkFilledregNo() {
	var inputVal = document.getElementById("id_application_method_regNo");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledregNo();
</script>
<script>
function checkFilledyom() {
	var inputVal = document.getElementById("id_application_method_yom");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledyom();
</script>
<script>
function checkFilledbody() {
	var inputVal = document.getElementById("id_application_method_body");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledbody();


</script>
<script>


function checkFilledmATD() {
	var inputVal = document.getElementById("id_application_method_mATD");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmATD();
</script>
<script>


function checkFilledmEstimate() {
	var inputVal = document.getElementById("id_application_method_mEstimate");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmEstimate();
</script>
<script>
function checkFilledmOverallComments() {
	var inputVal = document.getElementById("id_application_method_mOverallComments");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmOverallComments();





</script>

<!-- end of javascreept condition -->
<!--  Multiselect-->
<script type="text/javascript" src="multiSelect/test/lib/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="multiSelect/src/jquery.multi-select.js"></script>
<script type="text/javascript">
$(function(){
    $('#mFitting').multiSelect();
    $('#mphysicalOptions').multiSelect();
    $('#mPlayOptions').multiSelect();
    $('#mGearOptions').multiSelect();
    $('#mFootOptions').multiSelect();
    $('#mHandOptions').multiSelect();
    $('#mEngineOptions').multiSelect();
    $('#mTyreFLOptions').multiSelect();
    $('#mTyreFROptions').multiSelect();
    $('#mTyreRROptions').multiSelect();
    $('#mTyreRLOptions').multiSelect();
    $('#mTyreSOptions').multiSelect();
    $('#mLightHOptions').multiSelect();
    $('#mLightBOptions').multiSelect();
    $('#mLightIOptions').multiSelect();
    $('#mLightPOptions').multiSelect();
    $('#mLightTOptions').multiSelect();
    $('#mLightROptions').multiSelect();
    $('#mWiperOptions').multiSelect();
    $('#mScreenOptions').multiSelect();
    $('#mLocksOptions').multiSelect();
    $('#mMirrorsOptions').multiSelect();
//    $('#mfb').multiSelect();
    $('#line-wrap-example').multiSelect({
        positionMenuWithin: $('.position-menu-within')
    });
      $('#one').multiSelect();
      $('#two').multiSelect();
        $('#three').multiSelect();
    $('#categories').multiSelect({
        noneText: 'All categories',
        presets: [
            {
                name: 'All categories',
                options: [ ]
            },
            {
                name: 'My categories',
                options: ['a', 'c']
            }
        ]
    })
});
</script>

</body>
</html>
