import java.util.Scanner;
public class Q12_Stack {
    public static void main(String ar[]){
        Scanner read=new Scanner(System.in);
        Stack stack=new Stack(5);
        System.out.println("Press 1 to Push \nPress 2 to pop");
        System.out.println("Press 3 to Peek to element \nPress 4 to Display all elements \nPress 5 to exit");
        outerLoop:
        while(true){
            System.out.println("\nEnter your choose");
            int cho=read.nextInt();
            switch(cho){
                case 1:
                    System.out.println("Enter value to push");
                    int value=read.nextInt();
                    stack.push(value);
                    break;
                case 2:
                    stack.pop();
                    break;
                case 3:
                    stack.peek();
                    break;
                case 4:
                    stack.display();
                    break;
                case 5:
                    break outerLoop;
                default:
                    System.out.println("Wrong input");

            }
        }
        read.close();
    }
}

class Stack{
    int top=-1,length;
    int stack[];
    Stack(int length){
        this.length=length;
        stack=new int[length];
    }
    void push(int value){
        if(top==length-1){
            System.out.println("Stack Overflow");
            return;
        }
        stack[++top]=value;
    }
    void  peek(){
        if(top==-1){
            System.out.println("No Element");
            return;
        }
        System.out.println("Top value is :"+stack[top]);
    }
    void pop(){
        if(top==-1){
            System.out.println("Stack underFlow");
            return;
        }
        System.out.println("Value popped:"+stack[top--]);
    }
    void display(){
         if(top==-1){
            System.out.println("No Elements");
            return;
        }
        System.out.print("The elements are: ");
        for(int i=0;i<=top;i++){
            System.out.print(stack[i]+" ");
        }
        System.out.println();
    }
}
