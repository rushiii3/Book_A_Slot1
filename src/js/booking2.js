$('.section2').hide();
$('.section3').hide();
$step = $('.stepper-item');
$step.eq(0).addClass("active");
$('#prevBtnSecond').on('click',function(){
    $('.section2').hide();
    $('.section1').show();
    $step.eq(0).addClass("active");
    $step.eq(1).removeClass("active");
})
$('#prevBtnThird').on('click',function(){
    $('.section3').hide();
    $('.section2').show();
    $step.eq(1).addClass("active");
    $step.eq(2).removeClass("active");
})
$('#nextFirst').on('click',function()
{
    $event_name = $('#eventName').val();
    $event_Descr = $('#eventDescription').val();
    $num_of_students = $('#no_of_stu_attending').val();
    $event_date = $('#selectDate').val();
    $event_start_time = $('#selectStartTime').val();
    $event_end_time = $('#selectEndTime').val();
    if($event_name!="")
    {
      if($event_Descr!=="")
      {
        if($num_of_students!=="")
        {
          if($event_date!=="")
          {
            if($event_start_time!=="Select the start time")
            {
              if($event_end_time!=="Select the end time")
              {
                $step.eq(0).removeClass("active");
                $step.eq(0).addClass("completed");
                $('.section1').hide();
                $('.section2').show();
                $step.eq(1).addClass("active");
                
              }else{
                alert("Please input the event end time");
              }
            }
            else{
              alert("Please input the event start time");
            }
            
          }else{
            alert("Please input a date");
          }
          
        }else{
          alert("Please input number of students attending for event");
        }
        
      }
      else{
        alert("Please input your Event Description");
      }
      
    }
    else{
      alert("Please input your Event Name");
    }
})


$('#nextSecond').on('click',function()
{
    $department_namee = $('#department_namee').val();
    $Institute_OrgName = $('#Institute_OrgName').val();
    $Venue_name = $('#Venue_name').val();
    if($department_namee!=="Select Department")
    {
        if($Institute_OrgName!==""){
            if($Venue_name!=="Select Venue"){
                $step.eq(1).removeClass("active");
                $step.eq(1).addClass("completed");
                $('.section1').hide();
                $('.section2').hide();
                $('.section3').show();
                $step.eq(2).addClass("active");
            }else{
                alert("Please select your venue");
            }
        }
        else{
            alert("Please Input your Institute/Organisation Name");
        }
    }else{
        alert("Please select department first");
    }

})

$('#nextThird').on('click',function(){
    $rp_name = $('#rp_name').val();
    $companyName = $('#companyName').val();
    $designation = $('#designation').val();
    $experience = $('#experience').val();
    if($rp_name !== ""){
        if($companyName!==""){
            if($designation!==""){
                if($experience!==""){


                }else{
                    alert("Please input the resource person experience");
                }
            }else{
                alert("Please input the resource person designation");
            }
        }else{
            alert("Please input the resource person company name");
        }
    }else{
        alert("Please input the resource person name");
    }
})

