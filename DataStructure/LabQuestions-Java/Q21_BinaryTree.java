import java.util.Scanner;

class Node {
    int data;
    Node left, right;

    Node(int value) {
        data = value;
        left = right = null;
    }
}

public class Q21_BinaryTree {
    static Scanner read = new Scanner(System.in);

    public static void main(String[] args) {
        System.out.println("Root Value");
        Node root=createNodes();
        System.out.println("\nPost root of the tree is: ");
        postOrder(root);
    }

    public static Node createNodes(){
        System.out.print("Enter the value (-1 for no child): ");
        int value=read.nextInt();
        if(value==-1){
            return null;
        }
        Node theNode=new Node(value);
        System.out.println();
        System.out.println("Enter the left Node value of "+value+"");
        theNode.left=createNodes();
        System.out.println();
        System.out.println("Enter the right Node value of "+value+"");
        theNode.right=createNodes();
        return theNode;
    }

    static void postOrder(Node theNode){
        if(theNode==null){
            return;
        }
        postOrder(theNode.left);
        postOrder(theNode.right);
        System.out.print(theNode.data+" ");
    }
}
