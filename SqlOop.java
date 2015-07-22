package controllers;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class MetaGet {

	private String meta_description;
	private String origin;
	private String meta_title;
	private Statement statement = null;
    private ResultSet rs = null;
	
    public MetaGet (String origin, Connection connection) {
    	this.meta_title = this.getTitle(origin, connection);
    	this.meta_description = this.getDescription(origin, connection);
    }
	//retrieve title from database to store in database
	public String getTitle(String origin, Connection connection) { 
		String title = "";
	    try {
	    	PreparedStatement statement = null;
	    	statement = connection.prepareStatement( "SELECT title FROM pages WHERE slug=? LIMIT 1;");
			 
			 statement.setString(1, origin);
			 rs = statement.executeQuery();
			 
			 if(rs.next()) {
				  title = rs.getString("title");
			    }
	    }
	    catch(SQLException se) {
	    	se.printStackTrace();
	    }
	    return title;

	    
	}
	//get description from database to store in database
	public String getDescription(String origin, Connection connection) { 
		String description = "";
	    try {
	    	PreparedStatement statement = null;
	    	statement = connection.prepareStatement("SELECT meta_description FROM pages WHERE slug=? LIMIT 1;");
			statement.setString(1, origin);
			System.out.println("Check statement query : "+statement.toString());
			rs = statement.executeQuery();
			
	    	if(rs.next()) {
				  description = rs.getString("meta_description");
			    }
	    }
	    catch(SQLException se) {
	    	se.printStackTrace();
	    }
	    return description;
	    
	}
	//show title after create new object
	public String showTitle() {
		return this.meta_title;
	}
	//show description after creating new object
	public String showDescription() {
		return this.meta_description;
	}
	
}