class Shape{

    int x,y;
    public void getxyvalue(int x, int y){
        this.x=x;
        this.y=y;
    }
    public void showxyvalue(){
        System.out.println("X: "+x+"  Y: "+y);
    }
}


class Rectangle  extends Shape{

    int x,y;
    Rectangle(int x, int y){
        this.x=x;
        this.y=y;
    }
    public void showxyvalue(){
        System.out.println("X: "+x+"  Y: "+y);
    }
}


class FN3Q1MainShape{
    public static void main(String ar[]){
        Rectangle rect= new Rectangle(20,30);
        rect.showxyvalue();
    }
}