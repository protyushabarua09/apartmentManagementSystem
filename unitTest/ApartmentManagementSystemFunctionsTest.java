package unitTest;

import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;


public class ApartmentManagementSystemFunctionsTest {

	    public ApartmentManagementSystemFunctionsTest() {

	    }
	    
	    @BeforeClass
	    public static void setUpClass() {
	    }
	    
	    @AfterClass
	    public static void tearDownClass() {
	    }

	    
	    @Test
	    public void testLoginCheck() {
	        System.out.println("loginCheck");
	        String id = "fzahin.fz@gmail.com";
	        String pass = "123456";
	        ApartmentManagementSystemFunctions instance = new ApartmentManagementSystemFunctions();
	        String expResult = "pass";
	        String result = instance.loginCheck(id, pass);
	        assertEquals(expResult, result);
	   }
	    
	    @Test
	    public void testAddFloorCheck() {
	        System.out.println("addFloorCheck");
	        String floorNumber = "2nd Floor";
	        ApartmentManagementSystemFunctions instance = new ApartmentManagementSystemFunctions();
	        String expResult = "added";
	        String result = instance.addFloorCheck(floorNumber);
	        assertEquals(expResult, result);

	    }
	    
	    @Test
	    public void testAddUnitCheck() {
	        System.out.println("addUnitCheck");
	        String unitName = "10A";
	        ApartmentManagementSystemFunctions instance = new ApartmentManagementSystemFunctions();
	        String expResult = "added";
	        String result = instance.addUnitCheck(unitName);
	        assertEquals(expResult, result);

	    }
	    
	    @Test
	    public void testAddBranchCheck() {
	        System.out.println("addBranchCheck");
	        String branchName = "Dhanmondi";
	        ApartmentManagementSystemFunctions instance = new ApartmentManagementSystemFunctions();
	        String expResult = "added";
	        String result = instance.addBranchCheck(branchName);
	        assertEquals(expResult, result);

	    }
	    
	    @Test
	    public void testAddComplainCheck() {
	        System.out.println("addComplainCheck");
	        String complainName = "Gas problem";
	        ApartmentManagementSystemFunctions instance = new ApartmentManagementSystemFunctions();
	        String expResult = "added";
	        String result = instance.addComplainCheck(complainName);
	        assertEquals(expResult, result);

	    }
	    
	    @Test
	    public void testAddRentCheck() {
	        System.out.println("addRentCheck");
	        String rent = "tk.30500";
	        ApartmentManagementSystemFunctions instance = new ApartmentManagementSystemFunctions();
	        String expResult = "added";
	        String result = instance.addRentCheck(rent);
	        assertEquals(expResult, result);

	    }
	    }