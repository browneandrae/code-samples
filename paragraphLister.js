'use strict';

var listingApp = angular.module('listApp', []);

  listingApp.directive('paragraphs', function () {
	  return {
		  scope: {
			    adminServlet : '=',
			    email : '=',
			    displayField : '=',
			    displayName : '=',
			    removeServlet : '=',
			    results: '&',
			    
		  },
		  restrict: 'E',
	      controller: function($scope, $http) {
	    	  function visibleSwitch(input) {
	    		  if(input == 'Visible') {
	    			  input = 'Invisible';
	    		  }
	    		  else if (input == 'Invisible') {
	    			  input = 'Visible';
	    		  }
	    		  return input;
	    	  }
	    	 
			 //watch email field value to grab this user's indexed content
	    	$scope.$watch('email', function() {
				//get logged in user public content
	          $http(
	            {method: 'JSONP',
				 headers: {
					'Accept': 'application/json'
	                },
	             url: $scope.adminServlet,
	             params:{
            	 	'wt': 'json',
					'json.wrf': 'JSON_CALLBACK',
                    'q': $scope.email,
                    'indent': 'true',
                    'rows': 100,
					'fl': $scope.displayField
						}
	            })
	            .success(function(data, status,headers) {
	            	
					//grab private content
					var responseFill = '';
					$http({
					method: 'POST',
					 headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/x-www-form-urlencoded',
		                },
		            params: {
		            	'action': "fill",
		            },
		             url: 'user-paragraphs',
		             
					}).success(function(data, status,headers) {}			              responseFill = data.response;   
					});
					
	              var docs = data.response.docs;            
	              var index = 0;
				  
				  //switch visibility status to change in Solr Index
	              angular.forEach(docs, function(value,key) {
	            	if(value.hasOwnProperty("show")) {
	            		var oldValueDelete = docs[index]['show'];
	            		docs[index]['show'] = visibleSwitch(docs[index]['show']);
	            	}

	            	
	            	//fill private content, one logged in user can see
	            	if(docs[index]['paragraph-content'] == null || docs[index]['paragraph-content'] == '') {
	            		var retrieveKey = docs[index]['id'];
	            		docs[index]['paragraph-content'] = responseFill[retrieveKey];
	            	}
	            	index++;
	              });
	              $scope.results.docs = docs;
				  $scope.onecontent = "paragraph-content";
				$scope.onesubject = "paragraph-subject";
				

	            }).error(function(data, status,headers) {
				  console.log('Search failed!');
	            });
	    	 });
	      },
	      template: '<h2 class="list-header-title">Paragraph List for {{displayName}}</h2>' +
	      			'<div>'+
	                '<p id="list-top-links" ng-repeat="doc in results.docs"><a target="_blank" href="retrieve-graph?id={{doc.id}}"> {{doc["paragraph-subject"]}}</a></p>' +
	                '<div class=" list-row list-form" id="{{doc.id}}" ng-repeat="doc in results.docs">' +
	                '  <a id="user-list-title" class= "list-element list-title" href="retrieve-graph?id={{doc.id}}"><p>{{doc["paragraph-subject"]}}</p></a>'  +
	                ' <form method="POST" action="{{removeServlet}}">' +
	                '  <p id="user-list-content"  class= "list-element list-content">{{doc["paragraph-content"]}}{{doc["paragraph-content-hide"]}}</p>'  +             
	                ' <input id="user-list-delete" class= "list-element list-button loginbutton white" name="delete-button" type="submit" value="Delete" />'+
	                ' <input id="" class= "list-element user-list-visible list-button loginbutton white" name="user-list-visible" type="submit" value="{{doc.show}}"/>'+
	                ' <input type="hidden" name="paragraph-visible-delete-change" value="{{doc.id}}" /> ' +
	                ' <input type="hidden" name="user-list-content" value="{{doc[onecontent]}}" /> ' +
	                ' <input type="hidden"  name="paragraph-subject" value="{{doc[onesubject]}}" /> ' +
					' </form>'+
					' <br>'+
					'</div>',
		  };			
	 
  });
