package controllers;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.sql.Connection;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import org.apache.http.client.HttpClient;
import org.apache.solr.client.solrj.SolrClient;
import org.apache.solr.client.solrj.SolrQuery;
import org.apache.solr.client.solrj.SolrServerException;
import org.apache.solr.client.solrj.impl.HttpSolrClient;
import org.apache.solr.client.solrj.response.QueryResponse;
import org.apache.solr.common.SolrDocumentList;
import org.apache.solr.common.SolrInputDocument;

import model.UserProperties;

public class MakeFile {
	private List<String> paragraphs;
	private Connection connection;
	private String email;

	public MakeFile(ArrayList<String> documentItems, Connection connection,
			String email) {
		paragraphs = new ArrayList<String>();
		for(String item : documentItems) {
			System.out.println("Added "+item);
			paragraphs.add(item);
		}
		this.connection = connection;
		this.email = email;
	}

	public void newDocument(String email) throws IOException {
		UserProperties user = new UserProperties(this.email, this.connection);
		File fout = null;
		String header = user.getHeader();
		String footer = user.getFooter();

		// Do check for max number of files 10 before creating new file
		long numberOfFiles = this.lessthanMaxFiles(email);
		if (numberOfFiles < 10) {
			//create new file
			 fout = new File("/userDirs/" + email + "/fileNumber"
					+ numberOfFiles + ".txt");
			fout.getParentFile().mkdirs();
			fout.createNewFile();
			FileOutputStream fos = new FileOutputStream(fout, false);
			BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(fos));
			bw.write("     ");
			bw.write(header);
			bw.newLine();
			bw.write("     ");
			bw.write((String)this.paragraphs.get(0));
			bw.newLine();
			bw.write("     ");
			bw.write((String)this.paragraphs.get(1));
			bw.newLine();
			bw.write("     ");
			bw.write((String)this.paragraphs.get(2));
			bw.newLine();
			bw.write("     ");
			bw.write(footer);
			bw.newLine();
			bw.close();
			
			this.indexFile(email, fout.getName(), fout.getPath());
		} else {
			// call method delete earliest file then run file create
			this.deleteEarliestfile();	
			this.newDocument(email);
			// index file so can search
			this.indexFile(email, fout.getName(), fout.getPath());
		}
	}
	private void indexFile(String email, String filename, String filepath) {
		//make id using date class
		DateFormat df = new SimpleDateFormat("yyyy-MM-dd'T'HH:mm:ss.SSS'Z'");
	    Date dateobj = new Date();
		String DateToStr = df.format(dateobj);
		
		//index document with file values and date
	    SolrInputDocument doc = new SolrInputDocument();
	    doc.addField("user-email", email);
	    doc.addField("file-name", filename);
	    doc.addField("file-path", filepath);
	    doc.addField("file-date", DateToStr);
		try {
			SolrClient client = SolrIndex.connectSolr();
			client.add(doc);
			client.commit();
			client.close();
			
		} catch (SolrServerException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	private long lessthanMaxFiles(String email) {
		// TODO Auto-generated method stub
		String url=Globals.getSolrUrl();
		
		//Http preemptive authentication
		HttpClient httpClient = SetAuthentication.solrAuthenticate();
		QueryResponse res = null;
		long filesCount = 0;;

		HttpSolrClient solrSvr = new HttpSolrClient(url, httpClient);
		SolrQuery query=new SolrQuery();
		query.set("q", email );
		query.set("wt", "json");
		query.set("fl", "file-name");
		  try {
			  res= solrSvr.query(query);
			  SolrDocumentList results = res.getResults();
			 filesCount = results.getNumFound();
		  }
		  catch(SolrServerException se) {
			  se.printStackTrace();
		  } 
		  catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		  }
		  //After loop through and add all results close connection
		  try {
			solrSvr.close();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return filesCount;
	}

	private void deleteEarliestfile() {
		// Implement

	}

}
