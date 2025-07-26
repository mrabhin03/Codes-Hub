import java.util.Scanner;
public class Q17_SingleLinkedList {
    public static void main(String ar[]){
        Scanner read=new Scanner(System.in);
        SingleLinkedList List=new SingleLinkedList();
        System.out.println("Press 1 to insert \nPress 2 to delete");
        System.out.println("Press 3 to Display\nPress 4 to exit");
        outerLoop:
        while(true){
            System.out.println("\nEnter your choose");
            int cho=read.nextInt();
            switch(cho){
                case 1:
                    List.insert();
                    break;
                case 2:
                    List.delete();
                    break;
                case 3:
                    List.display();
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

class SingleLinkedList{
    NODE first,head,temp;
    Scanner read=new Scanner(System.in);
    SingleLinkedList(){
        first=head=temp=null;
    }
    void insert(){
        System.out.print("Enter the value to insert: ");
        int n=read.nextInt();
        head=new NODE(n);
        if(first==null){
            first=head;
        }else{
            temp=first;
            while(temp.next!=null){
                temp=temp.next;
            }
            temp.next=head;
        }
    }
    void delete(){
        if(first==null){
            System.out.println("No element to delete");
            return;
        }
        if(first.next==null){
            System.out.println("Deleted Value: "+first.n);
            first=null;
            return;
        }
        temp=first.next;
        NODE lastT=first;
        while(temp.next!=null){
            lastT=temp;
            temp=temp.next;
        }
        lastT.next=null;
        System.out.println("Deleted Value: "+temp.n);
    }
    void display(){
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
