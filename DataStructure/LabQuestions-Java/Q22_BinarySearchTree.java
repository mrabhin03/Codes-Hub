import java.util.Scanner;

public class Q22_BinarySearchTree {
    static Scanner read=new Scanner(System.in);
    public static void main(String ar[]){
        System.out.print("Enter the root value: ");
        int value=read.nextInt();
        Node root=new Node(value);
        BinarySearchTree tree=new BinarySearchTree(root);
        System.out.println("\nPress 1 to insert \nPress 2 to show in Postorder");
        System.out.println("Press 3 to show in Preorder \nPress 4 to show in Inorder");
        System.out.print("Press 5 to exit");
        outerLoop:
        while(true){
            System.out.print("\n\nEnter your choose: ");
            int cho=read.nextInt();
            switch(cho){
                case 1:
                    System.out.print("Enter the Value: ");
                    int valuesend=read.nextInt();
                    Node head=new Node(valuesend);
                    tree.insertvalue(root,head);
                    break;
                case 2:
                    System.out.println("The PostOrder of the Tree: ");
                    tree.postOrder(root);
                    break;
                case 3:
                    System.out.println("The PreOrder of the Tree: ");
                    tree.preOrder(root);
                    break;
                case 4:
                    System.out.println("The InOrder of the Tree: ");
                    tree.inOrder(root);
                    break;
                case 5:
                    break outerLoop;
                default:
                    System.out.println("Wrong input");

            }
        }
    }
}
class BinarySearchTree{
    Node root,head;
    Scanner read=new Scanner(System.in);
    BinarySearchTree(Node root){
        head=null;
        this.root=root;
    }
    void insertvalue(Node root,Node head){
        
        if(root.data>head.data){
            if(root.left==null){
                root.left=head;
            }else{
                insertvalue(root.left,head);
            }
        }else{
            if(root.right==null){
                root.right=head;
            }else{
                insertvalue(root.right,head);
            }
        }
    }
    
    void postOrder(Node root){
        if(root==null){
            return;
        }
        postOrder(root.left);
        postOrder(root.right);
        System.out.print(root.data+" ");
    }
    void preOrder(Node root){
        if(root==null){
            return;
        }
        System.out.print(root.data+" ");
        preOrder(root.left);
        preOrder(root.right);
    }
    void inOrder(Node root){
        if(root==null){
            return;
        }
        inOrder(root.left);
        System.out.print(root.data+" ");
        inOrder(root.right);
        
    }
}
class Node{
    Node right=null,left=null;
    int data;
    Node(int value){
        data=value;
    }
}
