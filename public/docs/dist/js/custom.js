// Als de pagina geladen is
// $(document).ready(function(){
//     //Voor elke button met de class planningid
//     $("button.planningid").each(function() {
//         //als de waarde van de planning id status 1 heeft dan knop groen maken
//         if(this.value == 1)
//             $(this).css("background-color","#00B16A");
//         });
//     }
// );

// //Als op een een tijdstip klikt word deze functie aangeroepen
// function postScheduleEmployee(obj, planningid){
//     //Veranderen de status van de knop
//     if(obj.value == 0){obj.value = 1}else{obj.value=0};
//     //HomeController wordt aangeroepen met nieuwe status
//     $.ajax({
//       url: "medewerkers-inplannen",
//       type: "POST",
//       data: {_planningid: planningid,_status: obj.value},
//       dataType: 'json'
//     }).success(function(data){
//         //Json checkt welke kleur een knop krijgt
//         if(data.result == 1){
//             $(obj).css("background-color","#00B16A");
//         }
//         else{
//             $(obj).css("background-color","#f4f4f4");
//         }
//     });
// }
