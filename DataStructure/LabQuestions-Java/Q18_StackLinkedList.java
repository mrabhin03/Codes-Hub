import java.util.Scanner;
public class Q18_StackLinkedList {
    public static void main(String ar[]){
        Scanner read=new Scanner(System.in);
        StackLinkedList stack= new StackLinkedList();
        System.out.println("Press 1 to push \nPress 2 to pop");
        System.out.println("Press 3 to display \nPress 4 to exit");
        outerLoop:
        while(true){
            System.out.println("\nEnter your choose");
            int cho=read.nextInt();
            switch(cho){
                case 1:
                    stack.push();
                    break;
                case 2:
                    stack.pop();
                    break;
                case 3:
                    stack.display();
                    break;
                case 4:
                    break outerLoop;
                default:
                    System.out.println("Wrong input");

            }
        }
        read.close();
    }
}


class StackLinkedList{
    NODE first,head,temp;
    Scanner read=new Scanner(System.in);
    StackLinkedList(){
        first=head=temp=null;
    }
    void push(){
        System.out.print("Enter the value to insert: ");
        int n=read.nextInt();
        head=new NODE(n);
        if(first==null){
            first=head;
        }else{
            head.next=first;
            first=head;
        }
    }
    void pop(){
        if(first==null){
            System.out.println("Stack underflow");
            return;
        }
        first=first.next;
    }
    void display(){
        if(first==null){
            System.out.println("No elements");
            return;
        }
        System.out.println("The values in Linked List are: ");
        temp=first;
        while(temp!=null){
            System.out.print(temp.n+" ");
            temp=temp.next;
        }
        System.out.println();
    }
}

class NODE{
    public NODE next=null;
    public int n;
    NODE(int n){
        this.n=n;
    }
}
