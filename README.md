# HR
base on spec of Cuong san

# ec2
khi chạy AMI thì aws sẽ tìm cho mình cái host vật lí phù hợp, r deploy instance trên đó. Khi stop ins xong, khi run lại thì nó sẽ tìm cái host vật lí khá, cho nên địa chỉ IPv4 public sẽ đc cấp 
![image](https://user-images.githubusercontent.com/83016185/166184039-4de2fdc8-191e-44bb-aa3b-ff7eaf2ed1b9.png)

# subnet
![image](https://user-images.githubusercontent.com/83016185/166185095-0c485c87-da93-4fc4-8d61-333eda776a00.png)

# video ngày ·1.2 
# task 1: create vpc
![image](https://user-images.githubusercontent.com/83016185/166394932-20b571f0-3d31-418f-9ff7-5c92e2eeac06.png)

# task 2: add subnet
![image](https://user-images.githubusercontent.com/83016185/166395402-e63d5625-addb-41de-9b46-667c3604e6da.png)
![image](https://user-images.githubusercontent.com/83016185/166395568-0b586563-daf2-4352-bab2-119b2df4f245.png)
tác dụng của privat vs public subnet là gì ỉ·ỉ······
# task 3: create security group: 
![image](https://user-images.githubusercontent.com/83016185/166395785-b4a0c20f-3c03-4653-a06b-2ce95e865b64.png)

# task 4: launch web ·
===================
# S3
![image](https://user-images.githubusercontent.com/83016185/166396587-6e3656f9-fc6a-48d5-8d7d-2dda80c0546a.png)
![image](https://user-images.githubusercontent.com/83016185/166396697-e143749b-f7fb-4672-8d8d-87257236a75a.png)
![image](https://user-images.githubusercontent.com/83016185/166396804-76268e40-4e16-4fc2-b6b5-bb749a8d234c.png)

# glacier: ới file ít truy vấn tới t ì nên cho ào glacier ·thay ì s3
![image](https://user-images.githubusercontent.com/83016185/166398764-92e2b671-03a2-4e11-a178-1819c946104b.png)
![image](https://user-images.githubusercontent.com/83016185/166399482-ad495d39-230b-485c-a96b-0b3a024b7ce5.png)

# EBS: như kiểu ổ cứng để gắn vào ·EC2··, có loại ssd và hdd··
![image](https://user-images.githubusercontent.com/83016185/166399749-4d05e190-cbe4-48c1-8c6f-da9341ef421a.png)
![image](https://user-images.githubusercontent.com/83016185/166399788-9555544a-b4e5-48fd-b18f-1180a091f177.png)

Khi truy cập đ ến file trong S3 thì ph ải đi qua đg interrnet nen ko nhanh ằng EBS (đi bằng đg local)·
![image](https://user-images.githubusercontent.com/83016185/166400106-cfbed0fb-83af-4e9e-a516-7e5f125ffcaf.png)

![image](https://user-images.githubusercontent.com/83016185/166400083-ed4c0a5b-4303-40f4-9476-3aa087241cec.png)
![image](https://user-images.githubusercontent.com/83016185/166400179-775bb31f-6d7e-4c6f-9b39-b17dda37f849.png)
![image](https://user-images.githubusercontent.com/83016185/166400331-badf6c20-6377-4378-bda5-8c68f177848b.png)

# EC2 instance storage (1 s ố l ại ec2 ·ó s ·ẵn instancew ·
![image](https://user-images.githubusercontent.com/83016185/166400417-a9069561-81a3-4c47-8545-c675a88d2f01.png)
![image](https://user-images.githubusercontent.com/83016185/166400453-3e65fd3d-59ed-402e-bd17-5e63fdb03657.png)

![image](https://user-images.githubusercontent.com/83016185/166400564-5f791ed5-dc15-477b-890b-ceb6cf153d04.png)

# module3: identity, security, access management 
![image](https://user-images.githubusercontent.com/83016185/166401006-58457b82-f094-42b4-834c-dfbaca37929e.png)
![image](https://user-images.githubusercontent.com/83016185/166401755-3ef9dda6-1451-4901-b798-414329885f24.png)
C ác l ớp b ảo mật
![image](https://user-images.githubusercontent.com/83016185/166402011-5c3b0b04-fdc9-4839-a6bc-aa5b444f7e6b.png)

IAM role: mang t ính ch ất t ạm th ời, khi user đc g án role thì·có quyền, th áo role thì mất quyền. th ờng khi set role sẽ set cả HSD (session duration)··
policy thì·mang t ính vĩnh viễn .
![image](https://user-images.githubusercontent.com/83016185/166402653-1fec4695-8b53-44d9-bf44-7db5fb91f34f.png)

QA: c ó đổi policy đc ko?

khi muốn cho ng/resource khác truy cập vào resource B thì ko nên share credential, mà hãy share theo kiểu IAM role. nhưng thế khi session expire thì sao, nó có dùng access key cũ để login vào đc ko nhỉ
![image](https://user-images.githubusercontent.com/83016185/166403667-97a6a1ca-2181-4cff-bbb2-8f4ac904cd43.png)

# module 4: DB
![image](https://user-images.githubusercontent.com/83016185/166404385-69e0eeba-a716-44e6-968d-29b1c1115225.png)
![image](https://user-images.githubusercontent.com/83016185/166404437-60094198-a052-4275-b5e0-456017e17681.png)

![image](https://user-images.githubusercontent.com/83016185/166404595-c8e6b6b7-6ae1-4c88-abbc-cdb7387e0621.png)
![image](https://user-images.githubusercontent.com/83016185/166404655-250a0a6b-2ce7-4b66-85d5-f3531519de1c.png)
![image](https://user-images.githubusercontent.com/83016185/166404688-a61a3a76-1063-414d-8862-2c9bc232084f.png)

# lap 2
![image](https://user-images.githubusercontent.com/83016185/166408319-564c3e1a-3ac9-45a8-b12c-c1a8c92eea84.png)

![image](https://user-images.githubusercontent.com/83016185/166407782-9713963b-7d92-45a6-8c87-f8a41b8b35f8.png)
![image](https://user-images.githubusercontent.com/83016185/166407882-f213f2e5-8ad6-4378-9a53-2e7f7a92a489.png)
![image](https://user-images.githubusercontent.com/83016185/166407936-4b4c187c-4287-41fc-a502-f80edd75a970.png)
![image](https://user-images.githubusercontent.com/83016185/166407962-26dd3b9b-ca76-49c9-a7c6-db3d881d3050.png)
![image](https://user-images.githubusercontent.com/83016185/166408004-bea7c94f-0771-46ac-a693-571e2ff96948.png)
![image](https://user-images.githubusercontent.com/83016185/166408025-1a2af82c-449e-40cb-ae76-9fcd19ebfa8d.png)
![image](https://user-images.githubusercontent.com/83016185/166408055-b3a257d5-25f8-480f-9e90-07ff078e26b3.png)
![image](https://user-images.githubusercontent.com/83016185/166408228-3b096242-21c0-4dbe-851e-84d515f6d701.png)
![image](https://user-images.githubusercontent.com/83016185/166408264-d0b810f1-debe-4fa8-b75d-8dbd4ccdab66.png)

# load balancer
![image](https://user-images.githubusercontent.com/83016185/166408588-58b6dced-27e6-4a68-83f4-7b413e7c1c0a.png)
