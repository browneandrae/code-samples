package web.servlet;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.Enumeration;
import java.util.HashMap;
import java.util.List;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import org.apache.solr.common.SolrDocumentList;
import org.apache.solr.common.util.NamedList;

import controllers.GlobalFunctions;
import controllers.SolrIndex;

/**
 * Servlet implementation class UserParagraphs
 */
//@WebServlet("/user-parapgraphs")
public class UserParagraphs extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public UserParagraphs() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//Url String Variables from Ajax Function
		String searchOrList = (String)request.getParameter("searchOrList");
		String modelQuery = (String)request.getParameter("modelQuery");
		
	
		if(searchOrList.equals("search")) {
			response.setContentType("application/json");
			SolrIndex searcher = new SolrIndex();
			NamedList<Object> documents = searcher.searchSolr(modelQuery);
			
			//build JSON string from NamedList String
			String documentsStr = documents.toString();
			documentsStr = documentsStr.replace("=", ":");
			documentsStr =  documentsStr.replace("SolrDocument", "");
			
			//write JSON response
			PrintWriter out = response.getWriter();
			out.print("content({");
			out.print(documentsStr);
			out.print("})");
		}
		
		if(searchOrList.equals("list")) {
			//implement user list on the content side
		}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		
		//Grab user from session
		HttpSession session = request.getSession(true);
		String email = (String)session.getAttribute("logged_in_user");
		
		//visible button
		String visibleB =  (String)request.getParameter("user-list-visible");
		
		//delete button
		String deleteB =  (String)request.getParameter("delete-button");
		
		//id of paragraph to change
		String id = (String)request.getParameter("paragraph-visible-delete-change");
		
		//action visible or delete
		String action = (String)request.getParameter("action");
			
			if(action != null) {
				//Fill the private content with content only user can see
				response.setContentType("application/json");
			    PrintWriter out = response.getWriter();
				HashMap<String, Object> emptyContents = new HashMap<String, Object>();
				emptyContents = SolrIndex.retrieveEmptyContent(email);
				
				//Convert Hash MAP to JSON and RETURN;
				String JSONConvert = GlobalFunctions.createJsonString(emptyContents);
				String resp="response";
				out.print("content({");
			    out.println(" \""+resp+"\": "+JSONConvert);
			    out.print("})");
				
				return ;
			}

			if(deleteB != null) {
				//delete a SolrDocument
				SolrIndex.deleteNode(id);

				//redirect to list
				String url = "/jobs-admin/index?origin=list";
				response.sendRedirect(url);

			}
			else if( visibleB != null ) {
				//Visible button pressed so reindex paragraph as hidden or visible depending on button pressed
				List<String> contentDate = new ArrayList<String>();
				contentDate = SolrIndex.retrieveSingleEmpty(id);
				String userContent = contentDate.get(0);
				String date = contentDate.get(1);
				SolrIndex.changeVisibility(id,(String)request.getParameter("user-list-visible"), request.getParameter("paragraph-subject"),userContent,email, date);
				
				//redirect to list
				String url = "/jobs-admin/index?origin=list";
				response.sendRedirect(url);

			}
			
			

		}
	}

