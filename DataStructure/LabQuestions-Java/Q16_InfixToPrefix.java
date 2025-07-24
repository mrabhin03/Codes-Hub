import java.util.Scanner;
public class Q16_InfixToPrefix {
    public static void main(String ar[]){
        Scanner read=new Scanner(System.in);
        System.out.print("Enter the Infix Value: ");
        String exp=read.nextLine();
        read.close();
        System.out.println("The Prefix expression of "+exp+" is : "+Covertion(exp));
    }
    public static String Covertion(String exp){
        String out="";
        int i=0;
        String rev="";
        for(int k=exp.length()-1;k>=0;k--){
            char value=exp.charAt(k);
            if(value=='('){
                rev+=')';
            }else if(value==')'){
                rev+='(';
            }else{
                rev+=value;
            }
        }
        exp=rev;
        char stack[]=new char[exp.length()];
        int top=-1;
        while(i<exp.length()){
            char value=exp.charAt(i);
            if(value==' ' ){
                i++;
                continue;
            }
            if(Character.isLetterOrDigit(value)){
                out+=value;
            }else if(value=='('){
                stack[++top]=value;
            }else if(value==')'){
                while(top!=-1 && stack[top]!='('){
                    out+=stack[top--];
                }
                top--;
            }else if(value=='+' || value=='-' ||value=='*' ||value=='/'){
                while(top!=-1 && stack[top]!='(' && powerCheck(value)<=powerCheck(stack[top])){
                    out+=stack[top--];
                }
                stack[++top]=value;
            }
            i++;
        }
        while(top!=-1){
            out+=stack[top--];
        }

        return new StringBuffer(out).reverse().toString();
    }
    public static int powerCheck(char op){
        switch(op){
            case '+':
            case '-':
                return 1;
            case '*':
            case '/':
                return 2; 
        }
        return 0;
    }


}
