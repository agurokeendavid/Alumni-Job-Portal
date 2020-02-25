<script type="text/javascript">
$(document).ready(function() {
  var dataTable = $('#rteacherData').DataTable({
    // "stripeClasses": [],
    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,
    "bLengthChange": false
  });

});

$(document).ready(function() {
  var dataTable = $('#forumData_Unpin').DataTable({
    "processing": true,
    "serverSide": true,
    "bLengthChange": false,
    "ordering": true,
    "columnDefs": [{
      className: "forum-td",
      "targets": 0,
      "searchable": false
    }],
    "ajax": {
      url: "serverside_data_forumUnpin.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".forumData_Unpin-error").html("");
        $("#forumData_Unpin").append(
          '<tbody class="forumData_Unpin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
        );
        $("#forumData_Unpin_processing").css("display", "none");

      }
    }
  });
});
$(document).ready(function() {

  var dataTable = $('#forumData_Pin').DataTable({
    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,
    "bLengthChange": false,
    "columnDefs": [{
      className: "forum-td",
      "targets": 0,
      "searchable": false
    }],
    "ajax": {
      url: "serverside_data_forumPin.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".forumData_Pin-error").html("");
        $("#forumData_Pin").append(
          '<tbody class="forumData_Pin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
        );
        $("#forumData_Pin_processing").css("display", "none");


      }

    }
  });

});
$(document).ready(function() {
  var dataTable = $('#alumniIT').DataTable({
    // "stripeClasses": [],
    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,
    // "bSort": false,
    "bLengthChange": false,

    "info": false,
    "columnDefs": [{

      "orderable": false,
      className: "forum-td",
      "targets": 0,
      "searchable": false

    }],


    "ajax": {
      url: "serverside_data_IT_Alumni.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".alumniIT-error").html("");
        $("#alumniIT").append(
          '<tbody class="alumniIT-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#alumniIT_processing").css("display", "none");


      }

    }
  });




});
$(document).ready(function() {
  var dataTable = $('#alumniCS').DataTable({
    // "stripeClasses": [],
    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,
    // "bSort": false,
    "bLengthChange": false,

    "info": false,
    "columnDefs": [{

      "orderable": false,
      className: "forum-td",
      "targets": 0,
      "searchable": false

    }],


    "ajax": {
      url: "serverside_data_CS_Alumni.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".alumniIT-error").html("");
        $("#alumniIT").append(
          '<tbody class="alumniIT-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#alumniIT_processing").css("display", "none");


      }

    }
  });




});



$(document).ready(function() {
  var dataTable = $('#alumniOA').DataTable({
    // "stripeClasses": [],
    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,
    // "bSort": false,
    "bLengthChange": false,

    "info": false,
    "columnDefs": [{

      "orderable": false,
      className: "forum-td",
      "targets": 0,
      "searchable": false

    }],
    "ajax": {
      url: "serverside_data_OA_Alumni.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".alumniIT-error").html("");
        $("#alumniIT").append(
          '<tbody class="alumniIT-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#alumniIT_processing").css("display", "none");


      }

    }
  });
});

$(document).ready(function() {
  var dataTable = $('#registerstud_serverside').DataTable({

    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,
    // "bSort": false,
    "bLengthChange": false,
    "columnDefs": [{
        className: "text-center",
        "targets": 1,
        "searchable": false
      },
      {
        className: "text-center",
        "targets": 2,
        "searchable": false
      },
      {
        className: "text-center",
        "targets": 3,
        "searchable": false
      },
      {
        className: "text-center",
        "targets": 4,
        "searchable": false
      }
    ],
    "ajax": {
      url: "serverside_data_registerstud.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".registerstud_serverside-error").html("");
        $("#eregisterstud_serverside").append(
          '<tbody class="registerstud_serverside-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
        );
        $("#registerstud_serverside_processing").css("display", "none");


      }

    }
  });



});

$(document).ready(function() {
  var dataTable = $('#registeredtracer_server').DataTable({

    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,
    // "bSort": false,
    "bLengthChange": false,
    "columnDefs": [{
        className: "text-center",
        "targets": 1,
        "searchable": false
      },
      {
        className: "text-center",
        "targets": 2,
        "searchable": false
      },
      {
        className: "text-center",
        "targets": 3,
        "searchable": false
      },
      {
        className: "text-center",
        "targets": 4,
        "searchable": false
      }
    ],
    "ajax": {
      url: "serverside_data_registeredtracer.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".registerstud_serverside-error").html("");
        $("#eregisterstud_serverside").append(
          '<tbody class="registerstud_serverside-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
        );
        $("#registerstud_serverside_processing").css("display", "none");


      }

    }
  });
});

$(document).ready(function() {
  var dataTable = $('#forumData_User_Unpin').DataTable({
    // "stripeClasses": [],
    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,

    "bLengthChange": false,

    "columnDefs": [{
      className: "forum-td",
      "targets": 0,
      "searchable": false
    }],
    "ajax": {
      url: "serverside_data_forumData_User_Unpin.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".forumData_User_Unpin-error").html("");
        $("#forumData_User_Unpin").append(
          '<tbody class="forumData_User_Unpin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
        );
        $("#forumData_User_Unpin_processing").css("display", "none");


      }

    }
  });

});
$(document).ready(function() {
  var dataTable = $('#forumData_User_Pin').DataTable({
    // "stripeClasses": [],
    "processing": true,
    "serverSide": true,
    "bAutoWidth": false,

    "bLengthChange": false,

    "columnDefs": [{
      className: "forum-td",
      "targets": 0,
      "searchable": false
    }],
    "ajax": {
      url: "serverside_data_forumData_User_Pin.php", // json datasource
      type: "post", // method  , by default get
      error: function() { // error handling
        $(".forumData_User_Pin-error").html("");
        $("#forumData_User_Pin").append(
          '<tbody class="forumData_User_Pin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>'
        );
        $("#forumData_User_Pin_processing").css("display", "none");
      }
    }
  });
});
$(function() {
  //bootstrap WYSIHTML5 - text editor
  $(".textarea").wysihtml5();
});
</script>