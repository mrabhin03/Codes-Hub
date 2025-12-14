f = open("data.txt", "r")

print("File read:")
count = 0

for word in f.read().split():
    if len(word) == 4:
        count += 1

print("Number of 4-letter words:", count)

f.close()
