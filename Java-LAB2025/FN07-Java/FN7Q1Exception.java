import java.util.Scanner;

class AgeException extends Exception {
    public AgeException(String message) {
        super(message);
    }
}

public class FN7Q1Exception {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Enter your age: ");
        int age = scanner.nextInt();
        
        try {
            if(age<18){
                throw  new AgeException("Age must be 18 or above to proceed.");
            }else{
                System.out.println("Age is okay");
            }
        } catch (AgeException e) {
            System.out.println("Exception caught: " + e.getMessage());
        } finally {
            scanner.close();
        }
    }
}
