import turtle
t = turtle.Turtle()
t.color("red","yellow")
t.begin_fill()
t.backward(100)
for i in range(5):
    t.forward(200)
    t.right(144)
t.end_fill()
turtle.done()
