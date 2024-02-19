'use strict';
var notify =
$.notify({
   title:'Record Deleted',
   message:'Record Deleted Successfully',
},
{
   type:'success',
   allow_dismiss:false,
   newest_on_top:false ,
   mouse_over:false,
   showProgressbar:false,
   spacing:10,
   timer:2000,
   placement:{
     from:'top',
     align:'right'
   },
   offset:{
     x:30,
     y:30
   },
   delay:2000 ,
   z_index:10000,
   animate:{
     enter:'animated bounce',
     exit:'animated bounce'
 }
});
