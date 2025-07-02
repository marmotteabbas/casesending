define(['jquery'], function() {
      var launch = function(cas) {

        if (cas == 0) {
          callstr = "<a href='javascript:require(["+'"local_casesending/call"]'+", function(amd) {amd.call(0);});;'><i class='icon fa fa-envelope-o fa-fw ' aria-hidden='true'></i>Contacter l’assistance du site</a>"
        }

        if (cas == 1) {
          callstr = "<a href='javascript:require(["+'"local_casesending/call"]'+", function(amd) {amd.call(1);});;'><i class='icon fa fa-envelope-o fa-fw ' aria-hidden='true'></i>Contacter l’assistance du site</a>"
        }

        if (cas == 2) {
          callstr = "<a href='javascript:require(["+'"local_casesending/call"]'+", function(amd) {amd.call(2);});;'><i class='icon fa fa-envelope-o fa-fw ' aria-hidden='true'></i>Contacter l’assistance du site</a>"
        }

        if (cas == 3) {
          callstr = "<a href='javascript:require(["+'"local_casesending/call"]'+", function(amd) {amd.call(3);});;'><i class='icon fa fa-envelope-o fa-fw ' aria-hidden='true'></i>Contacter l’assistance du site</a>"
        }

        if (cas == 4) {
          callstr = "<a href='javascript:require(["+'"local_casesending/call"]'+", function(amd) {amd.call(4);});;'><i class='icon fa fa-envelope-o fa-fw ' aria-hidden='true'></i>Contacter l’assistance du site</a>"
        }
        $(".footer-support-link:nth-child(3)").html(callstr);
      };
    return {
        launch: launch
    };
});