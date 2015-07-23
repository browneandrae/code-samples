var $jq = jQuery.noConflict();
var appendApp = angular.module('appendApp',[]);

appendApp.controller('Appender',   function($scope) {
  $scope.count = 0;
  var jqcount = 0;
  
  //function appends paragraph to add more than one paragraph on the admin page
  $scope.appendPara = function($event) { 
	  console.log($scope.count);
	  
	  //select base
	  paraBase = $jq('#paragraphWrap'+$scope.count);
	  if(paraBase.length < 1) {
		  var adjustCount = $scope.count;
		  while(paraBase.length < 1) {
			  adjustCount--;
			  paraBase = $jq('#paragraphWrap'+adjustCount);
		  }
	  }
	  $scope.count = $scope.count + 1;
	  jqcount = $scope.count;
	  var countMinusOne = $scope.count - 1;

	  //populate dynamic form elements so that user can input more content
	  var paraElementBuild ='<div id="paragraphWrap'+$scope.count+'">';
	  paraElementBuild += '<label for="paragraph-subject'+$scope.count+'" id="paragraph-subject'+$scope.count+'-label">Paragraph Subject '+$scope.count+'</label>';
	  paraElementBuild += '<input id="paragraph-subject'+$scope.count+'" name="paragraph-subject'+$scope.count+'" placeholder="Enter Paragraph Title" />';
	  paraElementBuild += '<label for="paragraph'+$scope.count+'" id="paragraph-'+$scope.count+'-label">Paragraph Content '+$scope.count+'</label>';
	  paraElementBuild += '<textarea id="paragraph'+$scope.count+'" name="paragraph'+$scope.count+'" class="user-para" minlength="125" ng-maxlength="500"></textarea>';
	  paraElementBuild += '<button id="remove-para-temp-button'+$scope.count+'" class="loginbutton white" id="remove-para-temp-button">Remove</button><input class="loginbutton white" id="visible-button-index'+$scope.count+'" name="visible-button-index'+$scope.count+'" value="Visible" />';
	  paraElementBuild += '</div>';
	  paraElementBuild += '<div id="inline-javascript-ajax'+$scope.count+'"></div>';

	  // insert aditional forms
	  paraBase.after(paraElementBuild);
	  
	 //remove paragraphs after adding, don't want to mix jquery and angular
	  $jq('#remove-para-temp-button'+$scope.count+'').on('click',  function(event) {
		  var selector ='#paragraphWrap'+jqcount;
		 $jq(this).parent().remove();
		  
		 
		  event.preventDefault();
	});
	  
	  //change visible status of content to index
	  $jq('input[id="visible-button-index'+$scope.count+'"').on("click", function() {
  		if($jq(this).attr("value") == "Visible")
			$jq(this).attr("value", "Invisible");
		else if($jq(this).attr("value") == "Invisible")
			$jq(this).attr("value","Visible");
  		return false;
	  });
	  
	  $event.preventDefault();
	  }

});

