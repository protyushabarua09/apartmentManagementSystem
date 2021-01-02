package unitTest;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.*;

public class ApartmentManagementSystemFunctions {
    public ApartmentManagementSystemFunctions() {
    	Connection connection = null;
        try {
     
    	  // Load the MySQL JDBC driver
    	 
    	  String driverName = "com.mysql.jdbc.Driver";
    	 
    	  Class.forName(driverName);
    	 
    	 
    	  // Create a connection to the database
    	 
    	  String serverName = "localhost";
    	 
    	  String schema = "dbaprtment";
    	 
    	  String url = "jdbc:mysql://" + serverName +  "/" + schema;
    	 
    	  String username = "root";
    	 
    	  String password = "";
    	 
    	  connection = DriverManager.getConnection(url, username, password);
    	 
    	   
    	 
    	  System.out.println("Successfully Connected to the database!");
    	 
    	   
    	    } catch (ClassNotFoundException e) {
    	 
    	  System.out.println("Could not find the database driver " + e.getMessage());
    	    } catch (SQLException e) {
    	 
    	  System.out.println("Could not connect to the database " + e.getMessage());
    	  }
    	 
    	    try {
    	 
    	 
    	// Get a result set containing all data from test_table
    	 
    	Statement statement = connection.createStatement();
    	 
//    	ResultSet results = statement.executeQuery("SELECT * FROM customer");
    	for(int i=0; i<1;i++){
    		ResultSet results = statement.executeQuery("SELECT * FROM tbl_add_admin");
    	    while(results.next()) {
    	        String Name = results.getString("name");
    	        System.out.print(i);
    	        System.out.println("Name:"+Name);
    	    }
    	}
    }catch (Exception e){
    	
    }
    }
    
    private static String userId[] = {"prithvi2409@gmail.com","fzahin.fz@gmail.com"};
    private static String password[] = {"654321","123456"};
    private static String floor[] = {"1st floor"};
    private static String unit[] = {"1A"};
    private static String branch[] = {"MirpurDOHS"};
    private static String complain[] = {"Water problem"};
    private static String rent[] = {"tk.30000"};
    
    
    
    public String loginCheck(String id, String pass) {
        ApartmentManagementSystemFunctions A = new ApartmentManagementSystemFunctions();
        String uid=id;
        String upass=pass;
        String message="fail";
        for (int i = 0; i < A.userId.length ; i++) {
            if(A.userId[i].equals(uid)) {
                if (A.password[i].equals(upass)){
                    message = "pass";
                }else {
                message = "fail";
                }
            }
        }
        return message;
    }
    
    public String addFloorCheck(String floorNumber) {
        ApartmentManagementSystemFunctions A = new ApartmentManagementSystemFunctions();
        String fNumber=floorNumber;
        String message="added";
        for (int i = 0; i < A.floor.length ; i++) {
            if(A.floor[i].equals(fNumber)) {
                message = "exists";
            }
        }
        return message;
    }
    
    public String addUnitCheck(String unitName) {
        ApartmentManagementSystemFunctions B = new ApartmentManagementSystemFunctions();
        String uName=unitName;
        String message="added";
        for (int i = 0; i < B.unit.length ; i++) {
            if(B.unit[i].equals(uName)) {
                message = "exists";
            }
        }
        return message;
    }
    
    public String addBranchCheck(String branchName) {
    	ApartmentManagementSystemFunctions C = new ApartmentManagementSystemFunctions();
        String bName=branchName;
        String message="added";
        for (int i = 0; i < C.branch.length ; i++) {
            if(C.branch[i].equals(bName)) {
                message = "exists";
            }
        }
        return message;
    }
    
    public String addComplainCheck(String complainName) {
        ApartmentManagementSystemFunctions D = new ApartmentManagementSystemFunctions();
        String cName=complainName;
        String message="added";
        for (int i = 0; i < D.complain.length ; i++) {
            if(D.complain[i].equals(cName)) {
                message = "exists";
            }
        }
        return message;
    }
    
    public String addRentCheck(String Rent) {
        ApartmentManagementSystemFunctions E = new ApartmentManagementSystemFunctions();
        String rent=Rent;
        String message="added";
        for (int i = 0; i < E.rent.length ; i++) {
            if(E.rent[i].equals(rent)) {
                message = "exists";
            }
        }
        return message;
    }
    
   
}

	