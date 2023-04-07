CREATE DATABASE garden_world;


USE garden_world;

-- Admin Account 
CREATE TABLE admin 
(
	admin_id int auto_increment primary key,
    username varchar(255),
    password varchar(255)
);

-- Phân loại sản phẩm
CREATE TABLE product_type
(
	product_type_id int auto_increment primary key,
    product_type_name varchar(255)
);

-- Sản phẩm liên quan
CREATE TABLE product
(
	product_id int auto_increment primary key,
    product_name varchar(255),
    product_imt varchar(255),
    product_type_id int ,
    FOREIGN KEY (product_type_id) REFERENCES product_type(product_type_id)
);


-- Chi tiết sản phẩm 

CREATE TABLE product_detail
(
	product_detail_id int auto_increment primary key,
    product_id int,
    product_name varchar(255),
    descriptions text,
    price float,
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);



CREATE TABLE product_img
(
	product_img_id int auto_increment primary key,
    product_id int,
    product_img varchar(255),
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);



-- Post Category (Loại bài viết)

CREATE TABLE post_category
(
	post_category_id int auto_increment primary key, 
    post_category_name varchar(255)
);


-- Post ( Bài viết )

CREATE TABLE post 
(
	post_id int auto_increment primary key,
    title varchar(255),
    post_img varchar(255),
    post_category_id int ,
    status int, -- 0 ẩn 1 hiển thị 
	FOREIGN KEY (post_category_id) REFERENCES post_category(post_category_id)
);

-- Topics ( Những chủ đề trong bài viết )
CREATE TABLE topics
(
	topic_id int auto_increment primary key,
    topic_name varchar(255),
    content text,
    post_id int,
    product_id int, -- sản phẩm liên quan
    FOREIGN KEY (post_id) REFERENCES post(post_id),
	FOREIGN KEY (product_id) REFERENCES product(product_id)
);

CREATE TABLE topics_img
(
	topic_img_id int auto_increment primary key,
    img_url varchar(255),
    topic_id int ,
    FOREIGN KEY (topic_id) REFERENCES topics(topic_id)
);

CREATE TABLE banner
(
	banner_id int auto_increment primary key,
    banner_img varchar(255),
    banner_text text
);

CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  post_id int ,
  foreign key(post_id) references post(post_id)
);





use garden_world;

INSERT INTO post_category (post_category_name)
VALUES
('Basic Knowlege'),  -- Kiến thức cơ bản (id = 1)
('Knowledge and tips'),		-- Kiến thức và mẹo ( id = 2)
('Garden Design'),	-- Thiết kế ( id = 3)
('Garden Accessories'), -- Phụ kiện (id = 4)
('Garden equipment'),	-- Thiết bị làm vườn ( id = 5)
('Soil and Fertilizer'), -- Đất và phân bón ( id = 6)
('Pesticides'),			-- Thuốc trừ sâu ( id = 7)
('Seeds'),		-- Hạt giống ( id = 8)
('Book'); -- Sách (id = 9)


INSERT INTO banner (banner_img , banner_text)
VALUES 
(
'Banner1.jpg',
'Waking up in a place far away, surrounded by only trees and birds
            Feel the spirit of refreshment, extremely comfortable.'
),
(
'Banner2.jpg',
'I love nature this scenery where only nature can help
            people become relaxed and forget all worries and troubles.'
);


select * from post;
SELECT * FROM post WHERE post_category_id = 2  AND status =1;
-- Tips
INSERT INTO post (title, post_img, post_category_id,status) 
VALUES
	('3 steps to create a bed garden', '1101.jpg', '2 ','1'),
	('5 Notes When Choosing Pots For Planting', '1102.jpg', '2 ','1'),
	('8 ways to use orange peels, tangerines need to know', '1103.jpg', '2 ','1'),
	('The following 9 tips will help you create a lush garden', '1104.jpg', '2 ','1'),
	('12 effects of vinegar', '1105.jpg', '2 ','1'),
	('15 great tips to save money when gardening', '1106.jpg', '2 ','1'),
	('How to check PH level at home', '1107.jpg', '2 ','1'),
	('5 natural ways to remove weeds from your garden', '1108.jpg', '2 ','1'),
	('Organic fertilizers you can make at home', '1109.jpg', '2 ','1'),
	('How to make a simple pesticide you can make at home', '1110.jpg', '2 ','1'),
	('Balcony standing gardening new ideas', '1111.jpg', '2 ','1'),
	('Create a big garden in a small space', '1112.jpg', '2 ','1');


-- Tips topics
INSERT INTO topics (topic_name, content, post_id) 
VALUES
	('null', 'When growing plants, your reality and your wishes are completely different (Actually, the soil is poor in nutrients, acidic or contaminated with lead while your preference is for plants that are suitable for high alkaline soil. ). So how to have an impressive garden for you? \n Building plant beds with a bed garden will make caring for and decorating plants easier than you think. Just a few small designs below you can make a garden on the bed garden to grow as you like. \n', '1'),
	('1. Planning to build a bed garden', 'Determine the following: \n - What is the size of your garden? \n - What kind of plants do you like to grow? \n - Do you want the garden to be fixed or movable (you need to use wheels to move) \n - What is the maximum cost you can spend on this? \n After answering these questions, let\'s start building! \n', '1 '),
	('2. Build them', 'For a fixed bed garden, you just need to pile up the frames of the wooden slats, put them on the garden floor, pour in the right soil and start planting! \n For a movable bed garden, you have to install the bottom and mount the casters for this bed garden. \n', '1 '),
	('3. Planting trees', 'Fill the soil about 3/4 of the bed, then spray with water to keep the soil moist. Sow your seeds or plants normally then cover with a thin layer of straw. Wait 1-2 weeks before they grow and then fertilize. You can adjust the amount of fertilizer needed for each plant \n', '1 '),
	('null', 'Perhaps you are reading this article because you have a passion for gardening, but you don\'t have a favorite garden corner yet, because you live in an apartment or rent a house, or you own a house. city but don\'t know where to start growing trees? Whatever the reason, there\'s one part of the garden that doesn\'t require a lot of space: planters. \n In this article, you will learn 5 basic gardening tips, more useful if you are a beginner and starting a garden with potted plants. These tips will help you create a garden on your balcony, patio or terrace. \n', '2 '),
	('1. Material and size of the pot', 'Each type of material has its own characteristics: plastic deteriorates in the sun, and in summer (especially in the tropics) if exposed to full sun, the plastic container can heat up. plants in them. You may think that the best choice is to grow in porcelain pots, but they are heavy and expensive and you cannot consider if you do not have a balcony or concrete roof. Clay, wooden, metal or concrete pots can be an option. Also, look at the size and design of the pot that will fit your space. All in all, when choosing a pot you have to consider other aspects as well. \n', '2 '),
	('2. Drainage capacity', 'If you are a beginner and starting a garden with potted plants, you must remember to provide adequate drainage for the pots. Always check before planting that the pot you are using has enough drainage holes. That will prevent bad plant symptoms like root rot, which occurs due to excess moisture. \n', '2 '),
	('3. Soil quality', 'For a healthy growth of plants, soil is key. Provide your plants with quality soil so they get all the nutrients they need for growth, flowering and fruiting. It is better to buy a potting soil but if you find that too expensive in terms of money, indoor plants are also fine, add a lot of organic or inorganic fertilizers added to it to improve the soil quality. \n', '2'),
	('4. Sunlight', 'Most container plants need at least about 5 hours of sun daily, and they may require daily watering - as the soil dries quickly in the sun. \n', '2 '),
	('5. Choose a variety of plants', 'Is your plant suitable for potted plants? Learn about the specific variety of these plants to decide whether or not a potted garden is suitable for your climate. \n', '2 ');

INSERT INTO topics (topic_name, content, post_id) 
VALUES
	('Here are 8 ways to use orange peels in your garden', 'null', '3 '),
	('1. Organic fertilizers', 'Citrus peels can be brewed, they are an excellent source of nitrogen, phosphorus and potassium. Before you put citrus peels to brew, be sure to cut them into small pieces to speed up the aging process. An added benefit of this is that the orange peels are recycled, which also saves the sanitation workers from the hard work of collecting it. \n', '3 '),
	('2. Natural Pesticides', 'If your tree is suffering from mild pests, avoid using chemical pesticides and try to repel them by using citrus peels. Simply tear their bark into small pieces to position around the affected tree or tear a hole in the bark and attach to the bark with a small stake near the infected area, some pests I really don\'t like the taste of orange peel, tangerine. \n Note that this citrus peel-based insecticide may not be as effective as chemical pesticides, but it\'s natural, organic and eco-friendly. \n', '3 '),
	('3. Chase Dogs and Cats', 'If you want to prevent your pets from entering your garden, try using citrus peels. Most dogs and cats hate the smell of citrus peels. Just mix small pieces of citrus peel with coffee grounds and scatter them around your tree. The combination of these two scents will deter pets - uninvited guests from visiting your garden. \n', '3 '),
	('4. Create a pleasant scent that filters the air', 'There are some citrus peels when throwing them in the fireplace will have a pleasant scent. This is a nice way to put citrus peels to use and is a great idea when having a party in the garden. \n', '3 '),
	('5. Increase soil pH', 'Leftover orange and tangerine peels can be used to acidify the soil. Just dry the citrus peels and grind them into a powder. Sprinkle this powder on the soil and mix it well, it\'s a great and very natural way to increase the acidity of the soil (remember, lowering the pH of the soil depends on how much citrus peel you have. The added benefit is that it also provides some essential micronutrients to the soil) \n', '3 '),
	('6. Get rid of ant infestation', 'Ants are beneficial insects because they protect plants from attacks by aphids and other pests, but sometimes they also damage your plants in terms of the soil around the roots. If you want to get rid of ants use citrus peels. Using citrus peels is a way for ants to absorb an organic and harmless poison that is harmless to humans and other animals and is sure to keep the ants out of your garden. \n', '3 '),
	('7.Make plant nursery materials', 'Citrus peels can make a great biodegradable pot to start with. \n', '3 '),
	('8. Mosquito repellent', 'Mosquitoes hate the smell of citrus peels. If you want to get rid of mosquitoes, simply rub lemon peel on your skin to repel them. You can also use scraped shells around your porch, balcony, and garden to help repel mosquitoes. \n', '3 ');

INSERT INTO topics (topic_name, content, post_id) 
VALUES
	('1. Good seed selection', 'Whatever plant you choose to plant, you need to choose good seeds. Criteria for selecting seeds for planting are: \n • Healthy seeds \n • No pests and diseases \n • Time to remove seeds from fruit is not too long. Usually about 1 year will give the best seed quality. \n To know for sure which seeds are good, you can apply the method of putting seeds in water after buying seeds. The seeds that sink to the bottom are good quality seeds. Conversely, any seed that floats to the surface of the water is a flat seed and needs to be removed. \n', '4 '),
	('2. Ensure adequate light for plants to grow', 'To take care of indoor plants, the first factor you need to keep in mind is light. So what is the right light for plants to grow? Depending on the characteristics of each plant, the amount of light will vary. There are ornamental plants that tolerate low light, but there are ornamental plants that need natural light to grow. \n However, even if the plants have low light tolerance, they still need to ensure adequate light for the plants to grow. If you are placing bonsai in the living room, you should make sure to place it in a location where there is about 2-3 hours of natural light in the room. Or you should put the plant in the sun for 2-3 hours a week to let it grow naturally. \n \'Strong\' light usually occurs in front of south-facing windows, large windows on the east or west side are not obstructed. Small unobstructed east or west windows provide \'medium\' light. The north window and those with frosted glass provide only \'low\' light. Your plants will only receive low light if they are more than 2 meters away from a window in any direction. \n In addition, many families also use more light emitted from lamps like sunlight, so the plants can photosynthesize like the outside environment, the plants will grow better. \n', '4 '),
	('3. Provide just the right amount of water for indoor plants', 'The second factor to keep in mind when caring for indoor plants is the amount of water. Usually with houseplants should not be watered too much. When you see that the soil is dry, then it should be watered. \ In addition, when watering plants, you should use a spray bottle to spray the plants. In the summer, it should be sprayed twice a day, once a day in the winter to increase moisture, clean the leaves, benefit the plant\'s photosynthesis, and make the plants green. \n Depending on the type of plant has different water tolerance, and the amount of water is also different for the plant to grow. You can choose the right potted plants, you can use bonsai pots with discs underneath for easy movement and good drainage, not leaking water into the house. \n', '4 '),
	('4. Nutritional supplements for houseplants', 'The right amount of fertilizer for ornamental plants when growing indoors will help promote the growth of plants. If you apply too much fertilizer, the plant will grow quickly, lose its shape, and destroy its position. It even kills the tree. \n But if you fertilize too little, it will lead to a lack of nutrients, difficult to grow and death of branches. Therefore, the best way is about half a month to fertilize the tree once, the rate of applying 5% synthetic fertilizer to the tree. In addition, using rice water to water plants is also very good for the growth of plants. \n Indoor plants limit the use of pesticides because they will affect your own health. So if the plant shows signs of pests, you should first use alcohol to wipe the leaves and roots, then use organic drugs to control pests. \n', '4 '),
	('5. Increase the humidity in an air-conditioned home or office', 'Dry air can be good for some drought-tolerant plants like Cactus, but most houseplants need moisture, especially tropical ones. You can buy a room humidifier with a cool mist, and make sure it\'s close enough to provide moisture in the air to the plant, but not wet the foliage or flowers. \n Another way is to use a spray bottle and mist the plants every day to keep them moist. Planting potted plants close together also causes them to add moisture in the air to provide mutual support. \n', '4 '),
	('6. Regularly pruning and cleaning indoor plants', 'When taking care of indoor plants, it is important to keep in mind that they need to be pruned regularly. Trim the roots so that the roots do not outgrow the pot, causing the pot to crack. Pruning leaves, dense or wilted branches helps the tree to be clean, elegant and avoid insects and insects. Pruning old branches also helps promote plant growth. \n Parallel to the pruning is to pay attention to using a soft cloth to wipe the dusty leaves (by the air purifier) so that the tree is always green and grows better. Remember to wear gloves when fertilizing, pruning or wiping leaves! \n', '4 '),
	('7. Take timely measures to restore the tree when it is dry', 'When detecting the tree with the phenomenon of yellowing, withering, dropping leaves, etc., it is necessary to take timely care measures to help the tree recover its vitality. \n Direct sunlight should not be irradiated to the plants to avoid causing the heat of the sun to adversely affect the plants or possibly cause the plants to die due to dehydration. The place to take care of the plant should be a cool place with fresh air and should be protected from strong winds. \n During the first period of plant growth, the soil should not be affected because at this time the organization and function of the tree is in a static state, if the ground breaking will make the root system damaged. \n At this time, only the yellowed, withered leaves should be removed, fully watered, and at the same time, you can mix nitrogen in water with low concentration to irrigate the plants. Once a week, after every month, the amount will gradually increase, after about 2-3 months, the concentration will increase. \n', '4 '),
	('8. Use the right soils', 'If you use ordinary soil, it will lack the nutrients needed for plants to grow. You need to combine many different ingredients to create the most suitable growing medium. \n To save time and effort researching the formulas for planting flowers and ornamental plants but not effective. Currently on the market there are species with many species of soil mixed ready to grow ornamental plants with high efficiency, you can refer to and choose. \n', '4 '),
	('9. Use a tree stand', 'With a small space at home such as a balcony, ... the use of racks or hanging shelves is extremely necessary. With the use of hanging shelves or racks, it will help your space look more airy, with more area to grow many different plants. In addition, the use of shelves or racks will contribute to the decoration of your space to look more beautiful. \n', '4 ');

INSERT INTO topics (topic_name, content, post_id) 
VALUES
	('See 12 Ways to Use Vinegar in the Garden for more details.', 'null', '5 '),
	('1. Clean the potted plants', 'Cleaning ceramic pots will help keep the soil inside the pot cool in the summer, prevent water from getting trapped, and brighten the color of the pots so they look more appealing. However, as they age, they absorb calcium, minerals and salts from water and fertilizers and make them look ugly. If you want to give them a new look, use vinegar to wipe them down. \n', '5 '),
	('2. Kill weeds on walls and walkways', 'Using vinegar is a great way to get rid of weeds that grow on the walls of your garden or from the crevices of a walkway. To kill them, simply spray from the tank with a solution of pure white vinegar. \n', '5 '),
	('3. Get rid of ants', 'Vinegar is very effective in getting rid of ants. To repel ants, mix equal amounts of water and vinegar (either white or apple cider) and spray this solution on the anthill in your garden. Indoors, find out ant paths, sinks, and windows to spray this vinegar solution on because the strong scent of vinegar will keep ants away from the spray. \n', '5 '),
	('4. Chase animals into the garden', 'Many animals, including rodents, cats, and dogs, don\'t like the strong scent of vinegar. You can keep unwanted guests from the gardens by soaking some old clothes in white vinegar and placing them on stakes around your garden where they go most often, this helps limit intrusion of these animals. \n', '5 '),
	('5. Extend the life of cut flowers', 'You can use vinegar to prolong the life of your cut flowers by adding 2 tablespoons of vinegar and 1 teaspoon of sugar per quart of water in the flower vase. \n', '5 '),
	('6. Kill weeds', 'If you want to get rid of weeds in your garden without fear of affecting your health by the toxicity of pesticides: Use vinegar. Vinegar is an herbicide and can be used for effective weed control. Weeds within 2-3 days will die after we use vinegar. \n', '5 '),
	('7. Insect restriction', 'Vinegar is an effective solution in getting rid of garden insects. To make a vinegar spray to kill garden insects, do the following: combine 3 parts water to 1 part vinegar into a spray bottle and add 1 teaspoon of laundry detergent. Shake the spray bottle to mix the contents thoroughly before using in the garden. \n', '5 '),
	('8. Preventing fruit flies', 'For this you will need 1 cup water, 1/2 cup apple cider vinegar, 1/4 cup sugar, and 1 tablespoon molasses. Mix it all together and put this mixture in an empty pot or hang it on any fruit tree affected by fruit flies, you will see how this solution will attract and trap fruit flies. there. The same solutions can be used to get rid of fruit flies in the house! \n', '5 '),
	('9. Fertilize acid-loving plants', 'Acid-loving plants such as rhododendrons, gardenias are very suitable for vinegar. Although its effects are temporary, you can give these plants a quick acidity boost with vinegar. Mix one cup of white vinegar for a gallon of water and water this acid-loving plant. \n', '5 '),
	('10. Remove rust from garden tools', 'Vinegar can be used to perform a root canal remover from garden tools. Just spray or soak the tools in pure vinegar and leave them for a few minutes and then rinse and clean the tool. \n', '5 '),
	('11. Killing fungus, mold', 'You can protect plants from mildew by using vinegar: add 2 teaspoons of vinegar in chamomile tea and spray this on affected plants in your garden. It\'s safe and organic! \n', '5 '),
	('12. Snail extermination', 'Among the many known uses of vinegar is this ability. You can kill snails with the help of vinegar. \n', '5 ');
    
    INSERT INTO topics (topic_name, content, post_id)
    VALUES
	('1. Make your own compost (organic fertilizer)', 'Why buy fertilizer from a gardening store when you can make your own from organic waste easily. Making compost doesn\'t require a big yard! You can use grass, kitchen waste, tree branches. \n', '6 '),
	('2. Use old newspapers to make potted plants', 'Don\'t spend money on buying starter seed trays and pots, there is a more economical way than using pots made of newspaper. These pots are compostable and completely free. \n', '6 '),
	('3. Grow plants in burlap sacks or bags', 'If you do not have space to grow potatoes in the garden, instead of buying pots you can use burlap bags and sacks. Of course, the yield won\'t be as high as in the garden but you\'ll still get some decent harvest. There are many tutorials available on the web for your help. \n', '6 '),
	('4. Self-propagation', 'Self-propagating plants that are easy to grow is the surest way to save your money. You can use different cutting methods, layering, seeds etc. if you are not familiar with the different methods of plant propagation. \n', '6 '),
	('5. Coating to save money', 'If you\'re not a new gardener, you already know that a layer of mulch can do wonders in the garden. First, it helps to save water. It also inhibits the growth of unwanted plants like weeds, which means less weeding and no herbicides. Mulch also improves soil fertility and its structure. Maintaining a 2-3 inch layer of mulch around the tree is advisable. \n', '6 '),
	('6. Avoid buying unnecessary plants', 'Avoid buying unnecessary plants whether you are buying plants or shopping for something else in the garden. Do your due diligence when buying and think that even if you have space for these plants but it\'s not right for you, pausing buying plants can save you a lot of money. \n', '6 '),
	('7. Use Vinegar', 'Vinegar is used in the kitchen, but it can also work miracles in the garden. You can use vinegar in many ways in your garden to save money as well as to keep your garden free of chemicals. \n', '6 '),
	('8. Use using coffee grounds and tea bags in the garden', 'Save money on buying organic fertilizers with the use of used coffee grounds and tea leaves. Coffee and tea grounds have many uses. Tear open some used tea bags and scatter them around the plant. The tea leaves will nourish your plants every time you water them by increasing nitrogen levels, improving soil structure and giving earthworms something delicious to eat. Coffee grounds have the same effect as tea grounds. \n', '6 '),
	('9. Kill insects with peel of orange or mandarin', 'If your crops are suffering from mild pests, avoid using chemical pesticides and try to repel them by using citrus peels. Simply tear off the lemon zest and place those small pieces in place around the affected plant or tear a hole in the peel and attach the pods to a shaft (bamboo or iron) near the infected area. It may not be as effective as using chemical pesticides but it is natural and organic. \n', '6 '),
	('10. Use cardboard to kill weeds', 'If you are looking for an effective solution to prevent weeds in the garden, here is a good one for you - using cardboard is one of the best ways to prevent weeds. It is completely biodegradable and lasts for a season or two. First, cut the grass or weeds to the ground level and then simply lay down the piece of cardboard on the unwanted plants. Then, soak the cardboard with a thick layer of soil or rock.\n', '6 '),
	('11. Use cooking water to water plants', 'When you have leftovers for some vegetables in your meal, don\'t pour the water down the drain, but instead pour it in your plants to water the plants instead of wasting it. You can also do the same with your boiled egg juice. \n', '6 '),
	('12. Test your soil', 'Although a first soil test may seem like an extra expense, it can save a lot of money if the soil test will identify what nutrients your soil is lacking, making it clear and you know the right fertilizers and crops to buy. It will also increase the productivity of your garden. You can also test your soil yourself at home .\n', '6 '),
	('13. Use of grass', 'Using grass clippings in the garden is a great way to save money on fertilizer. Simply leave the grass clippings on your lawn after mowing and they will save up to 25% on fertilizer consumption for the soil. \n', '6 '),
	('14. Use bricks in the yard', 'Bricks are one of the ancient materials, we are still using them, they are used in construction, but did you know it is possible to use bricks in the garden and it has a multitude of uses for garden bricks such as beautify, keep the soil moist,... \n', '6 '),
	('15. Use kitchen scraps for gardening', 'You can easily save some money on your grocery bill by growing a few of these staples from your diet. You can use kitchen scraps from your next meal. Check out the infographic below to learn how to grow from vegetable waste in the kitchen. \n', '6 ');
    
    INSERT INTO topics (topic_name, content, post_id) VALUES
	('The simple steps below are for you to learn how to test your soil pH at home. ', 'As you know there are three types of soil pH: acidic, neutral or alkaline. Soil type pH is measured by its "pH" level, below pH value 7 is acidic, above pH value 7 it is alkaline and if your soil pH value to 7 or around it (6-7). ,5) your land is neutral . \n What is your soil type, you should know it and it\'s important because knowing the soil type will give you better results when growing plants. It\'s simple: find out your soil type, and plant the right plants for that soil type. For example- you cannot grow gardenia in an acidic soil because it likes acidic soil. \n', '7 '),
	('1. Test the soil for alkalinity', 'Take a small amount of soil in a cup then take two tablespoons of \'vinegar\' and mix it well. Now look at it, if you hear a popping noise then this means your soil is alkaline \n Reason: Because vinegar is acidic and if your soil is alkaline then stir increased, that mixing will cause acids and alkalis to react with each other and result in bubbling and crackling noises. \n', '7 '),
	('2. Test for acidic soil', 'If your soil is alkaline doing the same as above, do the same thing but replace the vinegar with two tablespoons of \'baking soda\' in it, if you hear a frothy noise and the mixture stirs your soil is acidic. \n Reason: Baking soda is alkaline and if your soil is acidic this combination will stir up the mix and bubbling noise will come. \n If you didn\'t observe any foam noise in both tests that means your soil is neutral, which is good news. \n', '7 '),
	('Tips and warnings', 'With this test you cannot find out the exact pH value of your soil, but you will get an idea of knowing if your soil is acidic, neutral or alkaline. If you want to know the exact pH value go to a soil research center, a nearby garden center or buy a home test kit that will test the soil type for you. \n', '7 ');
    
    INSERT INTO topics (topic_name, content, post_id) VALUES
	('null', 'Weeds not only wreak havoc on our well-planned designs, but also compete with the plants we grow in our gardens for nutrients and water, affecting their ability to grow. Why to get rid of weeds in the garden without affecting the plants in the garden? \n There are two main types of weeds: \n Annual weeds \n - Having a growth cycle in a single crop. They are fast growing and often have short root systems \n Perennial weeds \n - These are grasses that have a lifespan of 5 years or more, have a long root system, require only a single root segment and soil conditions. The advantage is that they can regenerate quickly. \n Weed control can be done naturally without affecting other plants in the garden. Here, we will focus on basic and manual techniques that can be used throughout the growing season to control weeds and preserve most of the landscape in the garden and minimize damage to the plants. planted in the garden. \n', '8 '),
	('5 Strategies to Get Weeds Out of Your Garden', 'Plan control techniques to correspond to the seasonal life cycle of the weed: seed germination or new growth, flower and seed growth, or root development. For a perfect win you need to make sure that they can\'t grow this season and don\'t have any sprouts left to grow in the coming seasons. \n', '8 '),
	('1. Don\'t let the seedlings grow into big trees', 'Weeds grow faster than many crops so removing them when they are small plants with small roots will help limit their density later. Using a hoe or manually rooting them before they flower is the best way to prevent them from sprouting the next generation. \n Once the roots are in contact with the soil and their flowers grow older, there is a risk that next season your garden will be flooded with weeds. This strategy is particularly useful for annual weeds and can also be used against perennial weeds. \n', '8 '),
	('2. Don\'t let weeds get on the seeds', 'Once the grass has bloomed and developed seeds, it only takes a short time for these seeds to be carried everywhere in your garden, they will make you panic because of the large and large growth of the army. This. Always apply a strategy to destroy them before they get out of your control \n', '8 '),
	('3. Don\'t let weeds develop root systems', 'Systemic weeds that grow easily will get deeper into the ground and onto new shoots, seriously affecting your garden. Based on the formula: Leaves + sunshine = nutrition for roots, we can use scissors to prune or cut off all the stems and leaves, if it\'s not enough, root them out before they have a chance to sprout. new. \n', '8 '),
	('4. Create a strong defense system', 'Proper planting and gardening techniques can help you avoid weeds in your garden. Gardens with very good mulch will limit growing space and can resist the spread of weeds. \n', '8 '),
	('5. Plow and hoe the garden after each crop', 'Plowing and plowing the soil in your garden after each harvest will help you get rid of the weeds that are growing in the garden and the roots of the weeds left over from the last time. \n', '8 ');
    
    INSERT INTO topics (topic_name, content, post_id) VALUES
	('null', 'Farmers or gardeners in Vietnam often use chemical fertilizers to help plants grow quickly. This is an economical method but it goes against the standards of quality, environment and health. If you are looking to grow your own garden, why not make your own organic fertilizer instead of buying expensive fertilizer from a fertilizer store. It\'s very easy to do and it\'s cost-effective and healthy. \n', '9 '),
	('Organic fertilizers can be made at home', 'Basically all plants need three important nutrients to thrive: Nitrogen (N), Phosphorus (P) and Potassium (K). To grow, each plant needs a certain ratio of substances, for example, 10-5-5. Nitrogen is essential for leaves, phosphorus for flowers and fruits, and potassium is good for overall plant growth. In addition, to grow, plants also need a lot of other nutrients in a very small percentage. Some of those include magnesium, calcium, and sulfur. \n Plants are also affected by soil acidity, and bacterial biodiversity creates a healthy environment, all of which can be improved with organic fertilizers. Now let\'s get started on some simple recipes to make organic fertilizer: \n', '9 '),
	('1. Coffee grounds', 'Coffee grounds are a natural fertilizer that not only adds nitrogen to poor soil, it also increases soil acidity. This is especially good for flowers such as roses, hydrangeas \n Mixing coffee grounds into the soil at a rate of 1/4, coffee grounds also help improve the organic matter in the soil. \n', '9 '),
	('2. Organic fertilizer from banana peel', 'Banana peel contains a lot of calcium, phosphorus, potassium, which is very good for plants to produce vegetables and fruit. Bury the banana peels in the soil of the area you want to fertilize and let them decompose on their own. \n You can both throw away the banana peel and not have to spend money on fertilizer. In addition, if you want to use water-based fertilizers, you can also soak them for 2-3 days and use soaked water to water the plants. \n', '9 '),
	('3. Egg Shell', 'Eggshells are rich in calcium which is good for the growth of cells in plants. If you see that the flowers of the plant are rotting, then the plant you are growing is definitely lacking in calcium. \n To make compost from eggshells either crush the eggshells and bury them in the ground or you can make water by following the recipe: 20 shells and 1 gallon of water, boil the eggshells in water for a few minutes , then soak in water overnight. Use that water mixture to irrigate or spray directly into the soil. \n', '9 '),
	('4. Types of weeds', 'This is a great way to make a high nitrogen fertilizer and also treat nasty weeds : \n - Recipe: 1 bucket of water about 5 gallons mixed with fresh grass clippings. Soak them for 3-5 days. Dilute the fertilizer mixture in a ratio of 1/10 and pour them into the soil. \n', '9 '),
	('5. Mixture of organic substances', 'Composting materials : \n  • Organic waste such as leftovers, vegetables, meat, leftovers.. \n • Composting bins can be used with paint buckets, styrofoam bins, etc. The compost bin should be ventilated because the composting process is too much. aerobic process. \n Steps to make organic compost \n 1. Make a compost bin \n 2. Choose a place to keep the compost bin \n It is best to keep it on the terrace or away from home because during the composting process it will ferment and give off odors. The compost bin must be kept in a well-ventilated place with plenty of sunlight to heat the compost to shorten the incubation time. It should be located near the water source to facilitate humidification of the compost block. \n 3. Put materials in the compost bin \n Collect a variety of organic materials and put them in the compost bin. Add scraps from the kitchen, but only vegetables should be used, not fish and meat because they can carry pathogens and attract unwanted insects into your garden. . \n We can also use rags and scraps of paper to make compost. Can put a variety of organic materials, types of household waste into the compost bin. Composting is a continuous process so it takes time to decompose the compost. We should choose a ratio of 10% nitrogen-containing materials to 90% carbon-containing materials to start the composting process. n The important factor in the composting process is water, all materials put into the compost bin must be moistened, the compost pile must be checked regularly and added water if it is too dry, the compost mass too dry will not produce good fertilizer. \n', '9 ');
    
    
    INSERT INTO topics (topic_name, content, post_id) VALUES
	('null', 'We all know the harmful effects of chemical pesticides for our ecosystems and environment. If you have thought of being organic solutions and looking for some natural ways to get rid of the gardens, you are on the right track. \ n 05 ingredients in the natural pesticide that we introduce in the article below will be eliminated the obnoxious insects that are harmful to the plants in your garden. \ n', '10 '),
	('This homemade pesticide formula is completely easy to implement, all natural and easy to do at home', 'Commercial pesticides are one of the most effective ways to quickly solve pests and diseases, but if you want to use this self -made natural pesticide, and use it regularly will give you conclusion Incredibly. \ n You can apply this excellent pesticide using spraying to the vegetable garden and your common pests and diseases and it is really effective. Once a week is enough, however, if the invasion of insects is too much to apply more often. Once the plants began to recover, use it for 2 times per week or longer to prevent from pests. \ n', '10 '),
	('1.What do you need to prepare', '• 2 garlic root \ n • 2 teaspoons of turmeric powder \ n • 2 tablespoons of pepper (or use any other type of chili) \ n • 2 less diluted dishwashing liquid \ n • 3 branches of fresh mint leaves \ n • 12 separate water \ n', '10 '),
	('2.The steps to create natural pesticides', 'Step 1 \ n add garlic, mint and crush them in a blender for a few seconds. Then add water (in the amount mentioned above) and pepper to the mixture. Step 2 \ n Meave the mixture into a pot or boiler to boil this solution for a few minutes. Step 3 \ n When boiling, reminded from the stove and let it cool overnight. That\'s everything, your natural pesticide spray is ready. \ n Step 4 \ n Now you can use the solution to eliminate the hateful pests and diseases. Keep the solution into the bottle or spray bottle. \ n', '10 '),
	('3. How to use it', 'Shake well before using it. Spray the solution on all the leaves of the affected tree, do not forget the lower side. The best time to use it when the day is cloudy, preferably in the evening or early in the morning. \n', '10 ');
    
    INSERT INTO topics (topic_name, content, post_id) VALUES
	('null', 'Do you have a small balcony or yard and you want to develop it into a garden? Yes, if you arrange everything neatly and take advantage of every m2 of this space, you will be able to create a beautiful standing garden to help you watch every morning wake up. N gardening standing on the balcony is definitely an idea that will inspire you to embark on designing an impressive garden in a narrow space. One thing you need to remember is that gardening on the balcony is not only some pots and planting there. It is also a skillful way you have to manage and optimize space. \ n Using vertical space is part of this interesting and also challenging job. To help you have more ideas in making a garden standing on the balcony, we give some of the following suggestions: \ n', '11 '),
	('1.The upland garden uses enough fabric bags that can definitely contain soil and hang', 'You can grow tomatoes, herbs ... This is a great idea if you do not have a hanging basket, save money and take advantage of waste and help protect the environment anymore. \n', '11 '),
	('2. The clay pots are arranged on one different use of threaded steel and screws', 'The clay pots are suitable for planting because of its ability to moisturize, but these pots are designed for the standing garden, you need to use the stable items to connect them together because they are relatively heavy, Therefore, steel has threads and screws. \n', '11 '),
	('3. Use the support to keep the pot', 'This way you can use a lot of vertical space of your balcony, and also help you replace new crops easily. \n', '11 '),
	('4. Using a wooden basket with a wooden name board is a good idea for you. ', 'These suspended baskets look very interesting, you can write your name on it or name the garden standing on your balcony the names that sound really cool as "the garden in the clouds", "Happy Garden ", ... \n', '11 '),
	('5. Use a foam box or wooden box', 'To plant trees combined with shelves for multiple floors or hanging on the railing wall to save space. \n', '11 '),
	('6. Take advantage of the railing to hang many baskets', 'These are chosen by many of you because of its convenience, you do not need to design any sophisticated design, just a basket of trees and hangers you can help your balcony have more vitality by the color. green of trees. \n', '11 '),
	('7. Create a wooden hanger or a potted hanging wire', 'If you are picky and want to let the garden stand on your balcony look stylish, this option is relatively suitable for you, to make these wooden hangers, you also need to spend a lot of time. And more meticulous, in addition to being beautiful, it is also necessary to have certainty. \n', '11 '),
	('8. Using chains to connect pots is also an idea for you', 'If you want to hang heavy pots to plant trees on the garden standing on your balcony, it is necessary to be large enough to support these pots. \n', '11 '),
	('9. Make the most of the walls to be able to plant some types that can be decorated', 'An idea is not bad if you can take advantage of your own skin to design more trees. \n', '11 '),
	('10. Use colorful pots. Why not?', 'If you are a colorful person who calls me a colorful person, the multi -colored pots are definitely the best choice, based on your preferences. Standing on your work is so brilliant! \n', '11 ');
    
    INSERT INTO topics (topic_name, content, post_id) VALUES
	('null', 'You do not need a big yard to have a large garden; It may even be in a small space that you have if you are looking for space to exercise with the green of the leaves, but not much soil. No need to worry; A great garden can be built even in the smallest spaces! It all takes a few creative techniques, and you can do well with our useful instructions below \ n', '12 '),
	('1. Create multiple floors and create depth space to make the garden larger', 'Create a larger space by dividing different levels in your garden. Simple to say, divide your garden into sections! The sharing creates an illusion of a large garden. It will also make your garden look lively and interesting. \ n Do this by planting on Bed Garden multiple floors or adding mounds. In addition, growing large shrubs or small trees intertwined also create a wider feeling for the garden. Or if you use a more organized look, you can use stone or grass to separate the different parts of your garden. This is a very good idea for small porch. \ n another way to add space by planting your tree in the vertical direction. Make a living wall or mesh with wires, bamboo or even mesh bags. Plants like herbs and climbing trees can easily grow on it and make your garden look more dense. \ n', '12 '),
	('2. Food is an essential crop for your garden', 'A garden with trees is food that gives you great flexibility about what you can plant, although space is limited. In addition, the tree tends to be less picky about where they are grown (you can even grow vegetables in pots still for good harvest), and the best thing is that you have healthy, fresh organic foods. , good for health and is because your hands grow! \ n Herbs such as rosemary, vegetables, basil and thus can grow almost anywhere - you can put them in small tin boxes, bed gardens in each level and plant box. Sweet tomatoes are just an example of a tree that can grow well in a hanging basket or pot. \ n acid -like plant as blueberries thrive in pots because it is easier to control the pH level of the soil. Even big vegetables like lettuce should be in your garden, simply because they are harvested very quickly. \ n', '12 '),
	('3. Create square bed garden', 'Using a great technique called creating bed garden square, dividing your garden into square space, pouring soil and developing vegetables in each cell. Choose good growing vegetables, but take up less space. A few examples such as crops such as carrots, lettuce, radish, spinach, even growing larger plants such as cabbage and broccoli not only create neat, tidy and tidy. The scale for small houses that "close" vegetable (bed garden) is very good in supporting plants to proliferate and flourish. \ n', '12 '),
	('4. Create a standing garden', 'To save space, you can choose vertical garden, especially if you have a porch, backyard, or porch, or a balcony. Use your outdoor furniture and existing furniture combined with road barriers, windows with planting boxes or pots. You can grow vines, or herbs. Strawberries, tomatoes, and some other trees in a standing garden. \n', '12 '),
	('5.Mo Garden in the house', 'If you are ready to expand the scale, look for a few plants like lemon and oranges. These plants can be developed indoors by placing near the window with lots of light. When they reach their full size, carefully move them to a predetermined land in your garden. \ n has many techniques to get the most of your space. Just remember, your space may be limited, but your imagination is infinite! Be creative, and you will be surprised with the quick way to your garden will become vivid. \ n', '12 '),
	('7. Create a wooden hanger or a potted hanging wire', 'If you are picky and want to let the garden stand on your balcony look stylish, this option is relatively suitable for you, to make these wooden hangers, you also need to spend a lot of time. And more meticulous, in addition to being beautiful, it is also necessary to have certainty. \n', '11 '),
	('8. Using chains to connect pots is also an idea for you', 'If you want to hang heavy pots to plant trees on the garden standing on your balcony, it is necessary to be large enough to support these pots. \n', '11 '),
	('9. Make the most of the walls to be able to plant some types that can be decorated', 'An idea is not bad if you can take advantage of your own skin to design more trees. \n', '11 '),
	('10. Use colorful pots. Why not?', 'If you are a colorful person who calls me a colorful person, the multi -colored pots are definitely the best choice, based on your preferences. Standing on your work is so brilliant! \n', '11 ');
    
    -- Tips Topics_img
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('null', '1 '),
	('1101201.jpg', '2 '),
	('1101202.jpg', '3 '),
	('1101203.jpg', '4 '),
	('1102200.jpg', '5 '),
	('1102201.jpg', '6 '),
	('1102202.jpg', '7 '),
	('1102203.jpg', '8 '),
	('null', '9 '),
	('1102205.jpg', '10 '),
	('null', '11 '),
	('1103201.jpg', '12 '),
	('null', '13 '),
	('1103203.jpg', '14 '),
	('1103204.jpg', '15 '),
	('1103205.jpg', '16 '),
	('null', '17 '),
	('1103207.jpg', '18 '),
	('null', '19 ');
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('1104201.jpg', '20 '),
	('1104202.jpg', '21 '),
	('1104203.jpg', '22 '),
	('null', '23 '),
	('1104205.jpg', '24 '),
	('1104206.jpg', '25 '),
	('null', '26 '),
	('1104208.jpg', '27 '),
	('1104209.jpg', '28 '),
	('null', '29 '),
	('1105201.jpg', '30 '),
	('null', '31 '),
	('null', '32 '),
	('1105204.jpg', '33 '),
	('null', '34 '),
	('1105206.jpg', '35 '),
	('null', '36 '),
	('null', '37 '),
	('1105209.jpg', '38 ');
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('null', '39 '),
	('null', '40 '),
	('1105112.jpg', '41 '),
	('1106201.jpg', '42 '),
	('1106202.jpg', '43 '),
	('null', '44 '),
	('1106204.jpg', '45 '),
	('1106205.jpg', '46 '),
	('1106206.jpg', '47 '),
	('1106207.jpg', '48 '),
	('null', '49 '),
	('1106209.jpg', '50 '),
	('null', '51 '),
	('null', '52 '),
	('1106212.jpg', '53 '),
	('1106213.jpg', '54 '),
	('1106214.jpg', '55 '),
	('1106215.jpg', '56 '),
	('null', '57 ');
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('1107201.jpg', '58 '),
	('null', '59 '),
	('null', '60 '),
	('1108200.jpg', '61 '),
	('null', '62 '),
	('1108201.jpg', '63 '),
	('1108202.jpg', '64 '),
	('1108203.jpg', '65 '),
	('null', '66 '),
	('null', '67 '),
	('null', '68 '),
	('null', '69 '),
	('null', '70 '),
	('null', '71 '),
	('null', '72 '),
	('null', '73 '),
	('1109205.jpg', '74 '),
	('null', '75 '),
	('null', '76 ');
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('1110201.jpg', '77 '),
	('null', '78 '),
	('null', '79 '),
	('null', '80 '),
	('1111201.jpg', '81 '),
	('1111202.jpg', '82 '),
	('1111203.jpg', '83 '),
	('1111204.jpg', '84 '),
	('1111205.jpg', '85 '),
	('1111206.jpg', '86 '),
	('1111207.jpg', '87 '),
	('111208.jpg', '88 '),
	('1111209.jpg', '89 '),
	('1111210.jpg', '90 '),
	('null', '91 '),
	('1112201.jpg', '92 '),
	('1112202.jpg', '93 '),
	('1112203.jpg', '94 '),
	('1111204.jpg', '95 '),
    ('1111205.jpg','96');
    
    SELECT * FROM post;
    select * from topics;
    
-- Đất , phân bón ,....
INSERT INTO post (title, post_img, post_category_id, status ) VALUES
	('Which fertilizer is suitable for indoor plants?', 'honhop.jpg', '6', '1 '),
	('Top 10 beautiful flower seeds that are easy to grow for beginners', 'hoa_dua_can.jpg', '8', '1 '),
	('Help you better understand the types of soil to grow ornamental plants', 'land1.jpg', '6', '1 '),
	('Suggest 5 types of green pesticides in the best bonsai flowers today', 'andomec.jpg', '7', '1 '),
	('Balcony plants that are easy to care for, filter dust well for your home', 'title4.jpg', '8', '1 '),
	('TOP 10 EASY TO GROW AT HOME VEGETABLE SEEDS YOU CAN RESEARCH', 'muopdang.jpg', '8', '1 ');
    

-- Topics

INSERT INTO topics (topic_name, content, post_id ) VALUES
	(' Organic bonsai fertilizer', 'Organic fertilizer is an extremely familiar and popular fertilizer from time immemorial. They are derived from animal manure, domestic waste, kitchen waste, peat production plants, seafood...Organic fertilizers have all the necessary trace elements, macronutrients, and intermediates to produce nutrients. fertilizer for plants. It can be said that using organic fertilizers in bonsai care is a very economical choice.\n', '13 '),
	('1. Traditional organic fertilizer', 'Traditional organic fertilizers are derived from agricultural by-products, animal manures, etc., which are processed by traditional methods.\n', '13'),
	('1.1. Manure', 'It is a mixture of manure, litter, and urine from cattle. Depending on each type, incubation time, incubation method, the content of micro and macro elements will be different.\n Role:\nProvide food for plants \n Add organic matter to the soil, help the soil increase fertility and porosity. \nIncrease the efficiency of using chemical fertilizers. \n', '13 '),
	('1.2. Garbage feces', 'Garbage manure is processed from garbage, straw, green leaf stalks, ... composted with some yeast fertilizers such as lime, phosphate, manure...\nRole:\nProvide food for plants\nAdd organic matter to the soil, help the soil increase fertility and porosity.\nIncrease the efficiency of using chemical fertilizers.\nFor manure, the nutrient content will be lower. \n', '13 '),
	('1.3. Green manure', 'Green manure is the use of fresh leaves applied to the soil without going through the composting process. Use green manure by burying green manure plants in the soil when the plants are flowering, priming when tilling.\nRole:\nJust like manure and garbage.\n', '13 '),
	('2. Industrial organic fertilizer', 'This is a fertilizer processed from organic substances by industrial processes to create a fertilizer product of better quality than the input material.\nSome common fertilizers in the form of industrial organic fertilizers can be mentioned as:\n', '13 '),
	('2.1. Microbiological fertilizer', 'This fertilizer is produced from beneficial microorganisms inoculated in an organic medium.\nIn the composition contains beneficial microorganisms, which are phosphorus-dissolving microorganisms, potassium-degrading microorganisms, nitrogen fixing microorganisms ...\nRole:\nIncreases soil fertility Increase the resistance of plants\nReduces leaching and evaporation of nutrients.\nEnrich the amount of chemical fertilizer needed\nImprove the efficiency of using potassium, nitrogen and phosphorus fertilizers\nCurrently, people often use microbial phosphorus fertilizer as the main type to fertilize ornamental plants and flowers. In microbial phosphorus fertilizers contain microorganisms capable of decomposing indigestible organic phosphorus in the soil. Thanks to the decomposition of microorganisms, organic phosphorus will be converted into easily digestible phosphorus that can be absorbed by ornamental plants\n', '13'),
	('2.2. Organic bio-fertilizer', 'Organic fertilizers are produced by biotechnology (such as microbial fermentation) and mixed with some other active ingredients to increase the effectiveness of fertilizers.\nRole \nIncrease crop yield Create a favorable environment for biological processes in the soil to take place.\nIncrease the ability to absorb nutrients for ornamental plants\n', '13 '),
	(' Inorganic bonsai fertilizer (chemical fertilizer)', 'Inorganic or chemical fertilizers are fertilizers that contain nutrients in the form of mineral salts obtained through chemical and physical processes. The most commonly used inorganic fertilizers are:\n', '13 '),
	('1. Single stool', 'This is a chemical fertilizer containing only 1 of 3 mineral nutrients, N - P - K.\n', '13 '),
	('1.1. Nitrogen fertilizer', 'Include:\nUrea [CO(NH4)2]: contains 46%N, white color, small pellets like fish eggs, easily soluble in water. Manure has the ability to work on many types of soil.\nNitrogen sulphate fertilizer [(NH4)2SO4]: contains 21%N, crystalline, fine, ivory white, urine odor, slightly acidic. Because manure easily acidifies the soil, it is not recommended to use nitrogen sulphate fertilizer to fertilize on acidic soil\nCyanamide Calcium [CaCN2]: contains 21%N, powder without crystals, ash gray or white. This fertilizer is suitable for acidic soils.\n', '13 '),
	('1.2. Phosphate fertilizer', 'Phosphate fertilizer is mainly used for priming before sowing to stimulate the rapid growth of plant roots. The roots spread around and penetrate deep into the ground, helping the tree to hold up well and withstand drought. Plays an important role in the process of forming new plant parts. This is an important secret for you to use bonsai fertilizer most effectively.\nInclude:\nApatite fertilizer: Fine powder, gray-brown color. The stool is less hygroscopic and less metamorphic\nSuperphosphate fertilizer: It is a white or yellow-gray fine powder, or a few in the form of pellets. Fertilizers are easily soluble in water, quickly effective and suitable for use in neutral, alkaline, and acidic soils.\nTecmo Phosphate Manure: The stool is a light green, almost ash-colored powder with iridescent sheen.\nFertilizers have an alkaline reaction, so they work well in acidic soils.\n', '13 '),
	('1.3. Potassium fertilizer', 'Besides nitrogen and phosphorus, potassium is a necessary mineral for plants, which is applied to increase the resistance of plants. Increased waterlogging, drought, cold and pest tolerance, making the tree firm, less falling, and increasing the quality of agricultural products.\nInclude:\nPotassium chloride fertilizer: contains 56%K, pink or gray opaque powder, crystallizes into small granules. This is a physiological sour fertilizer, with looseness, easy to fertilize, can be applied as a primer or top dressing, suitable for many lands except for saline soils.\nPotassium sulphate fertilizer: Containing 50%K, small crystals, fine, white, easily soluble in water, little clumping. It is a physiological acid fertilizer, suitable for many crops.\n', '13 '),
	('2. Mixed manure', 'In chemical fertilizers, mixed fertilizers are also used very commonly, this type of fertilizer will contain 2 or more mineral nutrients. Some commonly used fertilizers are compound fertilizers and compost.\nCompound fertilizers: made from chemical reactions from basic materials.\nCompost: often multi-colored, formed by the mixing of mineral nutrients N. P. K… without chemistry occurring between substances.\nAbove is some information about the most popular inorganic and organic fertilizers today. Hope you have more knowledge to choose the right fertilizer for indoor plants.\n', '13 ');
    
INSERT INTO topics (topic_name, content, post_id ) VALUES
	('null', 'Being close to nature gives us a feeling of relaxation and comfort. Therefore, many people choose the hobby of growing flowers to relax, reduce the pressure of life as well as work. However, for beginners, it is advisable to choose flower seeds that are easy to grow, easy to care for, so as not to be discouraged leading to counterproductive effects. Understanding this, today AVi Vietnam will suggest you 10 most beautiful and easy-to-grow flowers. Hopefully the article will help you make the right choices for a better quality of life. Let\'s find out together! ', '14 '),
	('Why choose easy-to-grow flower seeds?', 'Like any job, you also need to solve the easy things first, the difficult things later. The same is true for growing flowers. Even though it\'s just a hobby, you still have to have a plan to make relaxing flower planting a right decision. If you are just starting out, you should choose flower seeds that are easy to grow for the following reasons:\n• You will not have to invest in advanced techniques and do not need strict conditions to get beautiful flowers.\n• Care time is not required. Every day you just spend a little free time to take care and after a short time you will get the results.\n• You will be more interested in growing flowers. This is not possible if you choose to plant cacti or succulents (germination time is quite long) or choose to nurse roses (this rate is quite low).\n• Cost savings. With only a few hundred thousand for seeds, pots and planting soil, you have a mini flower garden at home already. You can even just spend money to buy seeds and use Styrofoam boxes and garden soil to plant.\nThose are the reasons that AVi Vietnam recommends choosing beautiful flowers that are easy to grow when starting out.\n ', '14 '),
	('Top 10 beautiful flower seeds that are easy to grow', 'The standard "easy to grow" here is for flowers that are easily adapted to a variety of environmental conditions in different regions of Vietnam. In addition, they have other factors such as: they are not picky about the soil, do not take much time to care for and are less susceptible to pests and diseases. Here are 10 types of beautiful flower seeds that are easy to grow that you should care about:\n ', '14 '),
	('Portulaca grandiflora', 'Portulaca grandiflora is also known as the flower of the Rat. The outstanding feature is that it usually blooms at around 10 am, so it is named Ten Hour flower.\nThis flower is diverse in color. As a beginner, you should choose the ten o\'clock flower because it is easy to grow, adapts well to most soils and is not fussy about caring. The time you spend to take care of the plants is not much, just need to prepare the pot, soil, flower seeds, sow the seeds, choose a reasonable place to place the pot and then every day just need to water regularly, they will grow well and to flower early.\nSummer is the most brilliant ten o\'clock flower season. However, if you take care of it roperly, your flower pot can bloom all year round.\nAn interesting point about ten o\'clock flowers is that in addition to the available colors you can self-breed flowers together to produce new colors. It only takes a few months of planting to have beautiful multi-colored ten-hour pots for your home space.\n ', '14 '),
	('Periwinkle flowers', 'Periwinkle flowers are also known as lighthouse flowers or four precious flowers. As an easy-to-grow, easy-to-care, fast-blooming flower, the time from planting flower seeds to blooming flowers only takes about 2-3 months.\nIn addition to being ornamental and decorative, periwinkle flowers also have feng shui meanings to help bring good luck and exorcise. That\'s why every New Year comes, besides chrysanthemum and apricot flowers, many gardeners also trade very expensive periwinkle flowers.\nIn particular, periwinkle flowers also have the effect of supporting the treatment of high blood pressure, sedation, lowering blood sugar and treating cough.\nBecause of the advantage of being easy to grow, it has a positive meaning as well as the ability to treat diseases that this flower is very popular.\n ', '14'),
	('Sulfur cosmos', 'Sulfur cosmos also known as dragonfly flower. Is a flower with a slender body, growing in vertical bushes.\nDue to its fast growth rate, it is suitable for Vietnam\'s climate, so it is planted throughout the North, Central and South regions. That\'s why fake star flower seeds are sold in many places at a relatively soft price.\nIn addition to beauty, fake star flowers also give off a pleasant scent, creating a feeling of relaxation and comfort, so they are often used to arrange vases for living rooms, dining rooms, and even bedrooms.\nBesides, clone stars also have the effect of purifying the air, removing toxic gases, creating fresh air, so AVi recommends you to plant a few pots of fake stars to make the space more fresh!\n ', '14'),
	('Dwarf sunflower seeds', 'Surely you are not unfamiliar with this yellow flower of the sun and always facing the sun, right? Recently, dwarf sunflower seeds are much sought after because it has all the beauty of sunflowers but is small and cute, suitable for many spaces.\nDwarf sunflower planting time is quite short. It only takes you about 60-65 days to get the first flowers. Blooming time lasts up to half a year, so they are very popular.\nAs a flower that both possesses proud beauty and can give off a sweet fragrance, they are often planted around the yard, balcony to create a feeling of relaxation. In addition, you can also easily see dwarf sunflowers in parks.\nIf you are just starting to grow flowers, not planting dwarf sunflowers is a mistake on your part!\n ', '14'),
	('Chrysanthemum seeds', 'Is a flower that is too familiar to Vietnamese people. Chrysanthemums are easy to grow, easy to live and bloom quickly. In just a few months, you have a beautiful pot of chrysanthemums\nChrysanthemums have many types: yellow chrysanthemums, daisies, chrysanthemums, ... Depending on your needs and personal preferences, you have the right choice of flower seeds\nBesides decorative purposes, many people prefer chrysanthemums because of its good feng shui meaning. This is considered a flower symbolizing life, longevity, bringing luck and peace to the owner.\nHowever, if you choose chrysanthemums to grow at home, you should plant them in the garden aisle, balcony, on the window, where there is enough light but not hot sun. Special note: do not place chrysanthemums on the entrance to the kitchen, in the kitchen as well as in the bedroom. When planting chrysanthemums, you should not plant 1 root or plant 1 flower because according to spiritual conception, this affects the peace of the family. \n ', '14'),
	('Primrose', 'Evening primrose is known to many people for its noble and luxurious beauty. Currently, primrose has 5 colors: red, pink, dark pink, purple pink and white. The flower symbolizes the strength, grace, and excitement of youth.\nWith a lovely small tree shape (height is only about 30cm), the primrose also has heart-shaped flowers and leaves, so it attracts more eyes.\nThis is a cool-loving plant, succulent stem, suitable for growing in pots, placed in rooms or places with lots of shade.\nEvening primrose seeds are easy to germinate, the care process is quite simple. Therefore, if you love nobility and regal, then you should choose this flower to decorate your home!\n ', '14'),
	('Gerbera', 'Just with the name alone, this flower is already loved by many people, right? This flower brings wealth, wealth and prosperity to the owner. Besides, due to the ability to filter toxic gases of the living environment, many people choose gerbera flowers to grow around the house.\nLike other flowers, gerberas come in a variety of lovely colors. Depending on your preferences, you can choose any flower seeds or choose all colors to make your flower garden more colorful.\nGerbera likes cool weather, so it is grown a lot in Da Lat. If your place is in a hot sunny area, you should choose the right location to place the gerbera pot to avoid burning the leaves \nAbout how to grow gerbera, AVi has a very detailed tutorial. If you intend to grow gerbera, do not skip the tutorial article! It will help you understand more about this beautiful flower. \n ', '14'),
	('Evening primrose', 'As a delicate and gentle flower, it symbolizes strong friendship, dreamy love, etc. People who love evening primrose often have a warm heart, rich in affection and calm temperament.\nThis is one of the flowers that many people choose to grow to decorate fences and balconies. Because in addition to the vertical form, the evening primrose also has a drooping and vines form that is very soft and flexible. Florists in our country often choose drooping evening primrose seeds.\nIf you know how to take care of them, they will flower in several waves a year, this flower after another is very beautiful.\nEvening primrose is a brilliant flower in the summer sun, if you put the flower pot in a dimly lit place, they will not grow flowers but only leaves. It is best to choose a place that receives morning sun.\nIf you love gentle and lovely romance, don\'t miss this cute flower! \n ', '14'),
	('Butterfly pea flower', 'Referring to butterfly pea flower, many people immediately think of its anti-aging and cancer-preventing beauty benefits. It is not only beautiful in its blue color, but also in its wonderful uses.\nThis is also considered a natural color for women to freely make cakes, jelly and color in other dishes.\nWhen choosing butterfly pea flower seeds, people immediately think of the lovely flower trellis on the porch. Because it belongs to the form of a vines, in addition to its decorative effect, it also has the ability to cool the living space.\nTo learn more about the butterfly pea plant, don\'t miss the detailed tutorial article of AVi Vietnam! Surely it will be useful to you. \n ', '14'),
	('Haethbell', 'Heather is also known as marigold, borage or for get me not (please don\'t forget me). It has a gentle, delicate and very idyllic beauty and usually blooms in late autumn.\nHeather is made up of round pistils in the middle, surrounded by petals like termite wings forming a lovely circle. Although simple, this flower also has many colors such as white, purple, pink, blue purple, ...\nMany flower lovers have chosen heather seeds to grow into beautiful flower beds in the garden, on the porch, along the path to create a lovely romance for the house.\nAlthough the petals are gentle, its vitality is quite intense. Belonging to flowers that are easy to grow, easy to care for, love cool and dry, heather is more and more popular with people.\nIf you love the delicate, gentle and elegant features, then heather is a great flower for you. \nFlowers are born to beautify life. Flower lovers, close to nature will bring a deep soul beauty. Therefore, if you feel that life is too rushed or there is a lot of pressure on your shoulders, planting flowers is the right choice for you. Don\'t let your iPad, phone or other electronic devices take you away from the hustle and bustle of life. This article has reviewed beautiful flowers that are easy to grow. Your job is to prepare flower seeds and necessary tools to challenge yourself! You will definitely find yourself getting more energy from hand-grown flower pots!\nWish you soon plant lovely, lovely flower pots!\n ', '14');
    
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('The role of soil for ornamental plants', 'Soil is the medium that provides water, nutrients, and oxygen to plants and keeps them from falling.\nSoil consists of 3 components:\nThe gas part: provides oxygen to the plant, makes the soil porous, helps the roots absorb oxygen\nSolid part: provides plants with inorganic and organic matter\nLiquid manure: Provide water for plants, help plants grow\nGood soil is soil with the ratio: 40% solids, 30% water and 30% air\n', '15'),
	('General features of bonsai', 'All types of ornamental plants basically have common characteristics, if you know these characteristics, it will be easier for growers to take care of the tree and help the tree grow well.\nBonsai not only has the ability to reproduce sexually, but also has the ability to reproduce asexually.\nBonsai is always growing and developing.\nBonsai are sensitive and respond to all stimuli and changes in the environment in which they live.\nAll ornamental plants have a metabolic process with the surrounding environment.\nEach bonsai has its own structure, shape, and design characteristic for each species or variety.\n', '15'),
	('What elements are required for ornamental plants?', 'Water retention level: bonsai soils need to be able to hold and release enough water so that the plant\'s root zone retains moisture between visits during the day.\nDrainage Level: Excess irrigation water should be drained from the soil immediately. Poorly drained soil makes: high water retention, lack of aeration, leading to the deposition of many metal salts, plants prone to waterlogging and wilting.\n– Level of ventilation: The size of the material particles used in the bonsai soil needs to be large enough to have tiny gaps (between the soil particles), that gap is also the space for the roots to breathe. Healthy roots are when they have enough oxygen (Oxygen).\n', '15'),
	('Characteristics of good soil for growing ornamental flowers', 'Healthy plant roots are always thanks to the technical elements that interact with each other in the soil:\n Raw matter: Soil, sand, clay, ..\n Aerating agent, porous: Coarse grain, humus, organic fertilizer, ...\n Nutrients that should be present in ornamental soils include reasonable macronutrients of N, P, K as well as increased fertility by the amount of fiber, humus, medium and microelements. rich in such as Cu, Zn, Cr, Mg, Fe, bo... Especially if the soil used is a previously cultivated soil, many types of natural growth hormones, rich in beneficial microorganisms will work. help lush plants thrive.\nNote: Many people mistakenly believe that alluvial soil is very good for growing plants, but it is not because of the following reasons:\n This is a new type of soil, mixed with much sand, the soil particles (soil particles) are too fine, causing the roots to suffocate, slow growth.\nWhen the soil is dry, water it in: Water takes a long time to penetrate deep.\nWhen wet: Water will take a long time to aerate the soil, the roots will suffocate, in addition, due to the high amount of sand, the soil will quickly become hot, poor in humus, and difficult to develop microorganisms to enrich the soil.\n', '15'),
	('Types of soil for growing ornamental plants are popular today', 'Organic soil in bonsai soils is a mixture of many things such as dry leaves, bark, small rocks, peat, ... to form bonsai soil. Suitable for use when planting new plants.\nOrganic soil at first is very good for plants, but in the long run is not the first choice because:\n– If the leaves are dry, in the early stages of watering, the leaves are still shiny, leading to a situation where the water can\'t hold water. Later, when the leaves wilt, the drainage is difficult.\nPeat has very good water retention properties, so when the weather is not sunny, it is easy to lose water. When the weather is rainy for a long time, the peat will fall into excess water, which is not good for the plants.\nWith bark: The bark is also a good water-retaining material that also easily drains. This is possibly the best organic material. The bark will also rot and rot but the process of rotting and rotting takes a long time so we can rest assured with it.\nInorganic bonsai soil\nInorganic Soil: A soil mixture is said to be inorganic when there is a very small or no organic percentage. Inorganic are things like: lava rock, fired clay, coal slag, etc. These inorganic rocks are usually sold at plant nurseries or places that sell tools and bonsai materials. Can be used for a long time for plants.\n– The strength of inorganic soil is that it has a granular structure for a long time, not disintegrated into powder or slurry.\n– Baked clay: After 1-2 years of planting, the clay can also be soft and mushy. So after 1-2 years you should conduct soil improvement.\n– Use hard fired clay: Use 100% hard baked clay + add a little gravel to increase drainage (or mix about 10-20% more rotten bark) so that the soil can increase moisture retention (while maintaining the high drainage capacity of the soil.\nClean mixed soil\nAmong ornamental plants, this is the most commonly used potted soil because it has many advantages: adding nutrients to ornamental plants, enhancing the absorption and metabolism of plants. .\nThis type of soil has been treated to clean pathogens, very safe for users and plants. Ensure plants grow and thrive.\n', '15'),
	('How to make your own simple bonsai soil ', 'In addition to the types of potting soil introduced above, we also provide you with the following simple ways to make your own soil:\nYou need to prepare\n Potted plants\n Colored Earth\n Coconut coir\n Rice husks\n Tro\nDoing\n Planting land: 1:1 ratio, just enough soil for potted plants.\n Coconut coir: 1/6 ratio. Coconut fiber has a moisturizing effect, many vitamins help the roots quickly take root.\n Rice husk: 1/6 ratio.\n Ash: 1/6 ratio.\n After having the ratio of soil, coir, ash, rice husk, you use a shovel to mix the ingredients together. Once the soil mixture is well mixed, it can be planted. \n You can make your own potting soil with simple ingredients\nNote:\nWhen growing plants in pots, you should lined a piece of earthenware or a small tile to the drainage hole, regularly cut off dead leaves and yellow leaves.\nWhen growing plants in pots, we peel off the pots, put the plants in the middle of the pots, put the soil in the pots, and then use our hands to compress them.\nAbove are some sharing of gardenworld.vn about the types of soil for ornamental plants. In addition to the soil factor, you should also combine with other care measures to keep the plants healthy and beautiful.\n', '15');
    
    
INSERT INTO topics (topic_name, content, post_id ) VALUES
	('null', 'Greenworm in ornamental flowers is a disease that often occurs on ornamental plants, directly affecting the growth and development of plants. Thereby reducing the yield and quality of ornamental plants. Therefore, Agriviet has launched 5 types of green pesticides in ornamental flowers that are highly appreciated today for people to refer to and choose to treat green worms in ornamental flowers.\n', '16'),
	('Green caterpillars in ornamental flowers', 'Green caterpillar is a polyphagous worm that seriously affects crops. Each one can damage 15-20 flower buds in its life cycle (13-15 days). In particular, young green caterpillars are more capable of causing harm than adult caterpillars. Depending on the stage, the green worm has different morphological characteristics.\nEggs are oval, flat, ivory white, 0.3 - 0.5mm in diameter.\nWhen newly formed, the pupa is pale green, then turns pale yellow, has a length of 05 - 07mm and is covered with silk threads.\nThe young caterpillars are pale, the body is enlarged in the middle, the two ends are sharp, the body is clearly divided.\nBlue caterpillars have a length of 06 - 07mm, a wingspan of 14 - 15mm. The forewings are brown, the middle of the back has a wavy stripe running to the end, white on the male and yellow on the female. The two edges of the hind wings have very long feathery fringes.\nNewly hatched caterpillars crawl on the surface of the leaves to gnaw the cuticles to form small zigzag grooves, then start eating the leaves, leaving the cuticles forming translucent marks. Older caterpillars spread widely, eat leaf defects, bite young shoots, leaving only leaf veins left, reducing yield and crop quality.\n', '16'),
	('List of 5 types of green pesticides in ornamental flowers are highly appreciated', 'Green caterpillars in ornamental flowers can directly harm ornamental plants, reducing yield and quality of plants. Therefore, people need to take appropriate measures to thoroughly eradicate green worms in ornamental flowers. To help people solve this problem, Agriviet has introduced 5 types of green pesticides in ornamental flowers recommended by agricultural engineers.', '16'),
	('SecSaigon 5EC – Green insecticide in ornamental flowers', 'SecSaigon 5EC contains the active ingredient Cypermethrin. The drug has the ability to destroy green worms in ornamental flowers based on the contact mechanism and toxic taste. With packaging in aluminum bottles, the active ingredient of the drug is always guaranteed and maintained stable.\nBecause the effect is based on the contact mechanism, when spraying, people should pay attention to spraying the drug carefully so that the drug comes into contact with all parts of the bonsai to achieve the highest efficiency.\nDosage: 0.4 – 0.6 liters/ha\nUsage: Spray with 600 - 1200 liters of water/ha.\n', '16'),
	('Using Andomec 1.8EC to kill harmful green pests on ornamental flowers', 'The main ingredient in Andomec 1.8EC is Abamectin: 18 g/l, isolated from the fermentation of the fungus Steptomyces avermitilis (containing Avermectin B1a (80%) and Avermectin B1b (20%). The drug has a broad spectrum of action, eliminating many species of chewing and sucking oral worms. The product acts on the nervous system, causing the worm to stop eating or lay eggs immediately and die after a few days. The drug is less resistant to pests, less toxic to users, but has a toxic effect on fish and bees, so people should pay attention.\nDosage: 0.2 – 0.4 liters/ha\nUsage: The amount of water sprayed 400 - 500 liters/ha. Spray when pests appear\n', '16'),
	('Altivi 0.3EC – cures the root of green worms in ornamental flowers', 'Altivi 0.3EC contains active ingredient extracted from Azadirachtin seed kernel: 0.3%. The drug has both direct effects on killing insects due to toxicity, and indirect effects on causing anorexia and impotence, inhibiting the growth of many insects. At the same time, the drug also interferes with molting in larvae, causes fertilization and stops the development of eggs, larvae and pupae.\nThe drug has low toxicity to mammals, harmless to many natural enemies and pollinators in nature.\nDosage: 450 – 600 ml/ha\nUsage: The amount of water sprayed from 500 to 600 liters/ha. Spray when pests appear\n', '16'),
	('Green pesticides in ornamental flowers – Binhtox 1.8EC', 'Binhtox 1.8EC drug with the main ingredient is Abamectin 1.8% with contact and taste effects. The drug penetrates deeply and quickly into plant tissue, so it is less likely to be washed away by rain; Long-lasting insecticidal effect with many species of chewing and sucking insects, especially green worms in ornamental flowers. The drug has a high level of safety, you can rest assured to use it.\nDosage: 0.4 liters/ha\nUsage: The amount of water sprayed is 320 liters/ha. Spraying when aphids bloom.\n', '16'),
	('Using Kuraba WP to control green insects in ornamental flowers', 'Kuraba WP drug contains 2 main active ingredients: Abamectin 0.1% and Bacillus thuringiensis. The drug has a contact mechanism, toxic taste; affects the intestinal tract and central nervous system of green worms. The drug has a broad spectrum of killing many pests such as green worms, silkworms, caterpillars, worms and biological origin, high safety, little impact on natural enemies and the environment, leaving no residue. in agricultural products.\nDosage: 0.5 – 0.6 kg/ha\nUsage: Mix 10g / 10 liters of water. The amount of water sprayed is 500-600 liters/ha. Spraying when the caterpillars are young\n', '16'),
	('Using Pethian to treat green worms on ornamental flowers effectively', 'Pethian is a new generation biological insecticide with the main active ingredient Bacillus thuringiensis var. 7216:4000 IU/ml with the combination and resonance between Bacillus and bacteria.\nThe product is rated as safe for humans and animals. The drug can be used to protect crops in production areas according to safety standards such as VietGap, Global Gap, etc. After spraying for a few hours, the worms will stop eating and gradually die. Pethian is used to treat chemically resistant pests, especially pests on vegetables.\nDosage: 10-25 ml/10 liters of water\nUsage: The amount of water sprayed 540 - 600 liters/ha. Spray when new worms appear\nSome measures to prevent green pests in ornamental flowers\nSanitize and remove crop residues.\nUse a net to catch butterflies and pupate on leaves.\nRegularly check, when seeing that the density of greenworm increases rapidly, it must be sprayed with insecticides in time.\nGive the soil a rest period to kill the worm eggs in the soil.\nCreate conditions for natural enemies of pests to develop.\nProperly balanced fertilization is also a measure to limit the development of pests and diseases.\n', '16');
    
INSERT INTO topics (topic_name, content, post_id ) VALUES
	('null', 'Balcony is a great space to create a small garden to keep your house green and cool. If you are looking for the right plants for the balcony area of the house, let\'s find out with Cleanipedia 20 types of balcony plants that are easy to care for, filter dust, and tolerate drought well through this article!', '17'),
	('Features of balcony plants', 'The balcony is an area that is not too large, but it is a place to receive sunlight and air for the house. So when growing plants on the balcony you will have certain difficulties and disadvantages.Therefore, you need to choose plants that are both resistant to weather changes, require little soil, are easy to care for and suitable for the area of the balcony.\nIn the summer, the balcony has a temperature of up to 40 degrees Celsius, so you need to choose plants with good drought tolerance. In addition, in the rainy season, the balcony area will receive the most water, which can lead to waterlogging of flowers and plants.\nIn particular, west-facing balconies often have very strong winds. Therefore, when planting banyan trees, you should choose plants that can withstand the change of weather and take care of them carefully.\n', '17'),
	('20 types of balcony plants that are easy to care for, tolerate the sun well and help filter dust for your home', 'null', '17'),
	('1. Cactus', 'This is a plant known as the king of ornamental plants that are easy to care for, with good sun tolerance. To adapt to the hot environment, cactus leaves change into sharp spines to reduce drainage and retain water for the plant a lot. The tree has a succulent stem, with many small or large spines, different hard and soft depending on the type of tree.\nThe advantage of the cactus is that it grows and develops well in a hot environment with high temperature but is still green and succulent. The special thing about this plant is that it does not like a lot of water, which will cause the plant to become waterlogged and die.\nCactus is originally a plant that grows in barren wilds, extremely hot deserts. Therefore, when planted outdoors, they still live and grow well without watering.\nIf you take care of cactus, you only need to water a little and water about 1-2 times a week to avoid excess water leading to rot and death.\n', '17'),
	('2. Gentleman\'s bamboo', 'A sunny balcony decorated with a few small bamboo pots is a great suggestion. Plants both help purify the air and bring freshness and coolness to the home space. Besides, bamboo is also a feng shui garden plant that is meant to bring a lot of fortune and health to the owner.\nTruc Quan Tu is a tree with a soft, flexible stem and a very strong root that penetrates deeply into the soil, so it can withstand many impacts of hot weather and storms without being broken. Which plants grow at a very fast rate and with few harmful pests and diseases.\nPlanting a row of gentleman bamboo in front of your balcony, you will feel that the natural garden is gentle, interesting and a bit classic. If it rains a lot and the wind is strong, you should close the door tightly because the bamboo can fall everywhere.\n', '17'),
	('3. Perennial tree', 'Perennial plants not only make the balcony garden beautiful and green, but also a heat-resistant ornamental plant showing elegance and majesty. The tree has the characteristics from the trunk to the branches that have spines, sharp leaves, love light, live and adapt to hot weather at high temperatures. Although it is hot outside, the perennial plant still grows and develops well, the leaves are still spreading, green and beautiful.\nBecause of its adaptation to hot weather and temperature, this plant is chosen by many families as a heat-resistant tree planted in front of the gate, on the balcony, on the school campus, ...\n', '17'),
	('4. Succulent plant', 'Stone lotus is a light-loving, sun-loving plant, with succulent leaves and stems, very easy to grow and easy to live. When taking care of this heat-tolerant plant, you need to expose it to sunlight and water less to avoid root rot.\nWith hot weather conditions, succulents still grow and develop well, the tree always has a fresh and green appearance. This plant is diverse in types, each type has its own beauty, so they will create a new space for your balcony.\n', '17'),
	('5. Red banyan tree', 'Red banyan tree is a heat-tolerant ornamental plant and is well adapted to the weather conditions in Asia, especially Vietnam. On hot summer days, this plant still grows, develops well and is green. The red banyan tree has a fast growth rate, few pests and diseases, is easy to grow, easy to live, and does not require high care.\nThis ornamental plant has a unique and natural beauty from its large shiny leaves and young red buds that are very eye-catching. You can plant red banyan trees in the garden area or plant them in pots around the balcony of the house.\n', '17'),
	('6. Japanese palm tree', 'The Japanese palm tree has a tall shape, divided into many branches full of vitality, which means everything is smooth and promoted, successful in life. At the same time, this plant also brings elegance and luxury, which is suitable for planting in the balcony or living room.\nIn addition to the above factors, Japanese palm trees also have the ability to remove substances such as ammonia, reduce heavy metals in the air, repel insects, and keep your family\'s living and working space fresh and full of energy. .\n', '17'),
	('7. Aloe vera plant', 'Aloe vera is a plant with very strong vitality, easy to grow, easy to live and easy to care for. The plant has a trunk and long, pointed succulent leaves with a lush green color, along the edges of the leaves are tiny thorns. Because of these characteristics, the leaves are less evaporative to help the stem retain water well, from which the plant is extremely heat tolerant.\nAloe vera does not need to be watered too much, and is well adapted to the sun, so the balcony is the ideal place to grow this plant. Growing aloe vera not only beautifies the space, but they also bring many benefits to people such as skin beauty, delicious and nutritious food. In addition, aloe vera is also recognized by NASA as a good heat-tolerant plant with the ability to absorb harmful gases, filter the air, and create the best source of O2 at night.\n ', '17'),
	('8. Ferns', 'The fern is also a plant that grows wild in rocky areas, tropical forests or humid subtropical areas. Ferns are vines, tendrils, and comb-shaped leaves are very beautiful, so they are planted in hanging pots in many places around the house.\n Ferns are very easy to grow balcony plants, not only have the ability to filter smoke well but also create a unique and beautiful aesthetic for the home space.\n', '17'),
	('9. Female guardian hair', 'Venus hair is an ornamental plant in the fern family, they do not like to move much. Therefore, if you want plants to live long, you need to create a stable living environment for them. Venus hair is quite resistant to the sun, but they also love moisture, so you need to provide moisture regularly.\nVenus\' hair with triangular leaves, with 3-4 small grooves at the end is a very beautiful shape. Therefore, plants can be grown in table pots or hanging pots outside the balcony. This plant can be used to filter the air, remove dirt in the living environment, especially the balcony where it is often exposed to the most dust, making your home space greener.\n', '17'),
	('10. Tree of Life', 'This is a good heat-tolerant ornamental plant, so it is grown by many families and considered as an indoor medicine with a very good cooling effect, treating skin burns. The tree of life has a succulent trunk and branches, the tree has good water retention, strong growth, long life and extremely good drought tolerance.\nIn addition, the tree of life also has bright, vivid and gorgeous flower colors that not only bring a fresh space but also a rich color for your home.\n', '17'),
	('11. Anthurium', 'Anthurium has a short stem that is often bushy, fast-growing, partially shade tolerant, and perennial. This ornamental plant prefers cool humid climates and has medium water requirements. In addition, anthurium plants also have the ability to filter the air, bringing a new source of air to your home. This is a line of ornamental plants that are often grown in offices and balconies, so they are easy to care for and they flower continuously.\n', '17'),
	('12. Tiger Tongue Tree', 'The tiger tongue tree is very heat tolerant and is a fortune tree that brings good feng shui, so it is loved by many people. In the Chinese concept, this tree symbolizes the 8 precious things that the 8 gods want to give to their owners, including beauty, prosperity, health, intelligence, money, art, poetry and long life.\nThis plant is a light-loving plant and can also live in shade. The leaves of the tree grow from the base, the inside of the leaves and the stem are full of water, very hard, rising up very firmly. Tiger tongue has good water retention, so the tree can grow and develop green in hot weather conditions.\n ', '17'),
	('13. Yellow areca tree', 'Almost typical of Vietnamese villages are the straight rows of areca trees, soaring in front of the house. Today, many families prefer to plant ornamental areca trees to decorate their homes. Because of the same growth characteristics with the areca family, the ornamental yellow areca tree is also able to withstand the sun, like the wind and open places. This plant is very suitable for you to see on your balcony.\n', '17'),	
    ('14. Sesame tree', 'It is a shade perennial with wide foliage and beautiful flowers with vibrant colors in the summer. This plant has a wide canopy but does not grow strongly in height, so it is very suitable for small garden spaces.\nSesame tree can be used as shade in front of the house or decorate your yard. Besides, the tree has good heat tolerance, easy to grow and easy to take care of.\n', '17'),
	('15. Evening primrose plant', 'If your balcony is in the direction of the sun, the evening primrose plant is a very suitable choice. It is both a good sun-tolerant balcony plant, easy to live, and brings natural beauty to the balcony. Evening primrose is a shrub, flowers and leaves are very slender, soft, have a fast growth rate and very good drought tolerance.\nThis plant is often grown in pots placed in rows on the balcony terrace or hung on the vine on the balcony for the flowers to droop down to create a gentle, brilliant and charming beauty for your home. Evening primrose flowers are very diverse in colors such as pink, red, purple, white ... so you have the right choice for the balcony.\n ', '17'),
	('16. Chrysanthemum plant', 'Chrysanthemum is a species of plant in the daisy family, which tends to grow downward. This plant is very simple, has only one green color and rarely blooms. Green chrysanthemum leaves are very little yellow all year round, the climbing stem is as long as a silk and hangs down like a natural green curtain.\nChrysanthemum plants are considered a suitable choice for planting in the balcony, because they adapt very quickly to the environment, are easy to live and do not need much watering care.\n', '17');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	(' 17. Tianmen east', 'Tianmen Dong is also known as the fairy hair. Belonging to a climbing shrub species, there are small pointed tips forming beautiful chains and the average length of the vines is 1 - 1.5m or longer if the soil and growing conditions are good.\nDong Thien Mon blooms from March to May and the tree bears fruit from June to September. In addition to beautifying the balcony space, Thien Men Dong is also a precious medicinal herb used as medicine. This plant is very easy to grow and has a long life, so it is loved by many people.\n', '17'),
	('18. Snow is not pink', 'Snow painted non-pink is a popular shrub in buildings and or planted in balconies because of their strong vitality. Possessing an impressive and eye-catching beauty from the first time, snow painted phi pink has a silvery green tree mixed with extremely beautiful pale pink purple flowers.\nNon-pink painted snow is native to the Chihuahuan desert and the Mexican region, so it has very good drought tolerance. Currently, trees are planted in many balconies, cafes, and gardens, because their flowers have very beautiful colors and bloom many times a year for everyone to enjoy the flowers every day.\n', '17'),
	('19. Ivy', 'Ivy is a balcony plant with a special leaf shape and is always green, symbolizing the intense vitality of youth. Therefore, they have been popular since ancient times and are considered as a plant that can dispel negative energy and bring prosperity, peace and luck to the owner.\nIn addition, ivy also has the ability to filter the air, absorb toxic substances, cancer-causing substances from cigarette smoke. This plant grows in clusters, drooping, likes sun and shade, so in addition to growing on the balcony, we can also grow it in small pots hanging indoors.\n', '17'),
	('20. Betel nut with sawed leaves', 'Saw palmetto trees are not only suitable for planting on a balcony with good sun tolerance, but they can also live well in the shade as in the living room or office. The green color of the tree helps people to look cool and bring a feeling of comfort, relaxation and increase work efficiency. In particular, the saw palmetto tree also has the ability to purify the air of the living environment to help your house always airy and fresh.\n', '17'),
	('Notes when choosing balcony plants', 'To keep the balcony of the house fresh and full of green as well as colorful flowers, when choosing plants, you should pay attention to the following balcony plant care:\n• Prioritize plants with good drought tolerance: The balcony space is a place to receive sunlight, so even if you water the plants regularly, the evaporation rate of water is also very fast. If they are water-loving ornamental plants, it is very difficult to live long.\n• Choose plants of medium or small size: The balcony area is usually very small and narrow, if you want your family\'s balcony to have a variety of colors, you should choose plants of medium or small size. Thus, the overview will be more beautiful, avoiding trees that are too big to make places for harmful insects to hide.\n• Choose plants that are easy to adapt to the environment and easy to care for: The weather has a lot of changes, sometimes it\'s sunny and it rains erratic, so you should choose plants that are easy to adapt to fit your balcony space. your family\n• Coordination and intercropping of many different plants: You should choose colorful plants to avoid boredom and increase diversity. Each flower scent will make you feel more relaxed, comfortable and comfortable when taking care of them. Many people are still concerned about the problem of not being able to take care of plants, not being able to regularly water the plants, so they do not plant trees on the balcony. But don\'t worry, now there are many types of balcony plants that tolerate sunlight, filter dust, are easy to care for and have a very long lifespan. You can refer to the 20 plants that we suggest above to keep your balcony garden green, add more colors and help clean the air.\n', '17'),
	('Notes when choosing balcony plants', 'To keep the balcony of the house fresh and full of green as well as colorful flowers, when choosing plants, you should pay attention to the following balcony plant care:\n• Prioritize plants with good drought tolerance: The balcony space is a place to receive sunlight, so even if you water the plants regularly, the evaporation rate of water is also very fast. If they are water-loving ornamental plants, it is very difficult to live long.\n• Choose plants of medium or small size: The balcony area is usually very small and narrow, if you want your family\'s balcony to have a variety of colors, you should choose plants of medium or small size. Thus, the overview will be more beautiful, avoiding trees that are too big to make places for harmful insects to hide.\n• Choose plants that are easy to adapt to the environment and easy to care for: The weather has a lot of changes, sometimes it\'s sunny and it rains erratic, so you should choose plants that are easy to adapt to fit your balcony space. your family\n• Coordination and intercropping of many different plants: You should choose colorful plants to avoid boredom and increase diversity. Each flower scent will make you feel more relaxed, comfortable and comfortable when taking care of them. Many people are still concerned about the problem of not being able to take care of plants, not being able to regularly water the plants, so they do not plant trees on the balcony. But don\'t worry, now there are many types of balcony plants that tolerate sunlight, filter dust, are easy to care for and have a very long lifespan. You can refer to the 20 plants that we suggest above to keep your balcony garden green, add more colors and help clean the air.\n', '17');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('null', 'Food safety is currently an alarming issue in the market, because for the purpose of profiteering, there are many products of poor quality and not ensuring food safety and hygiene are produced, directly affecting the quality of food. greatly affect human health.\nWith the purpose of meeting the demand for clean vegetables in the family, the demand for growing clean vegetables at home is increasing day by day to ensure hygiene, avoid poisoning and in the long run the risk of underlying diseases including cancer. Growing clean vegetables at home will provide a source of clean food, bring high nutritional value to your family meal, besides being safe and cost-effective.\n', '18'),
	('Top 10 types of vegetable seeds that are easy to grow at home, including bitter melon', 'null', '18'),
	('1. Water spinach seeds', 'Water spinach is an easy-to-eat and relatively cheap vegetable, but according to experts, currently water spinach is among the vegetables with a very high rate of rapid growth spray and is very dangerous to health. most human.\nSo people can grow water spinach at home because this vegetable is usually very easy to grow and fast to harvest. Besides, this vegetable can be grown all year round, you can grow it in beds if you have land to grow vegetables or grow in plastic trays on the balcony for families living in the city.\nYou can grow water spinach by seeds, after sowing about 25-30 days, it can be harvested. When harvesting, you use scissors to cut 5cm above the ground, water and add fertilizer. Every 7-10 days you can get the next batch. \n', '18'),
	('2. Vegetable seeds', 'Cannabis is a popular vegetable and is used by a large number of Vietnamese from urban to rural areas and used in every daily meal. There are many types of vegetables such as: collard greens, broccoli, mustard greens, watercress, cabbage, cabbage, bok choy... and all of them have a cooling effect on your body. In oriental medicine, this is a soup that helps to cure constipation, cough, prevent diseases, and has the effect of lowering gas and longing. Because this vegetable is temperate, easy to eat with many nutrients, it is often used by many families and it seems that in the vegetable garden of any Vietnamese family, this plant is indispensable.\nPlanting is very simple, you just need to sow the seeds directly into the soil. After sowing, cover with 1 more soil about 2cm and water evenly. After 3-5 days the plant will germinate. After the plant has about 2-3 true leaves, it is separated to plant. Add nutrients for good plant growth.\n', '18'),
	('3. Lettuce seeds', 'Lettuce - a common side vegetable in Vietnamese dishes such as spring rolls, pancakes, fried noodles,... Is a vegetable that contains a lot of minerals such as Fe, Ca, Mn, Zn, etc. Cu, Nacl, K, Co, As, phosphate, sulfate, sterol, carotene and vitamins like A, B, C, D, E, etc. are very good for health. This vegetable has many great effects such as supporting cancer prevention, preventing cardiovascular diseases, rheumatism, cataracts.\nFor women, this is known as a panacea when it comes to weight loss and skin beautification in the most effective way. For those who are on a diet and want to lose weight, salads are the most ideal solution because they have the effect of filling the stomach, helping people to eat without feeling hungry.\nDue to the high magnesium content, the salad juice has a "supernatural ability" in restoring muscle tissue, enhancing brain function. Eating lettuce is also very good for diabetics, good for both pregnant and lactating women...\nThere are many varieties of lettuce for you to choose from such as: Purple Lettuce, Ruby Lettuce, Roman Red Lettuce, Green Oak Salad, Yellow Shrimp Lettuce, Lettuce Sprout\n', '18'),
	('4. Kale Vegetable Seeds', 'Kale is known as the queen of vegetables because of the use that it brings extremely useful for human health. Unlike other common kale, kale has green or purple curly leaves, that\'s why they are also called kale or green kale, purple kale.\nKale is very suitable for temperate regions, therefore, in Vietnam, the climate of Da Lat is the ideal environment for this plant to grow most strongly, but other areas can also be grown. Kale kale.\nDubbed the green vegetable queen because this vegetable is considered the most nutrient-dense food on the planet. Kale is extremely low in calories, contains a lot of fiber and contains no fat, along with many vitamins and minerals needed by the body. He also has the effect of supporting the promotion of cardiovascular health, helping the body eliminate toxins, enhancing vision, supporting weight loss...\n', '18'),
	('5. Spinach seeds', '  Mangosteen is grown and harvested all year round. Just spread the seeds evenly on the surface. Cover with a thin layer of soil about 0.5cm. Then water the seeds to germinate. After 30 days you can harvest. When harvesting braids, you should use a knife to cut the root 5cm above the ground so that every 12-15 days you can harvest a new litter.\nIn medicine, spinach has cool, sweet, slightly pale taste, it has the ability to affect 5 meridians including: Heart, Can, Small intestine, Sphincter and Colon, which have the effect of clearing heat, detoxifying, laxative, analgesic, convenient. The main treatment is constipation, less milk, painful urination, urinary frequency, joint pain.\n', '18'),
	('6. Pumpkin Seeds', 'Pumpkin, zucchini, and pumpkin are fruits used as common food for all families, it is also the most versatile fruit. Pumpkin, zucchini, and pumpkin are both used to process food and drinks, and are trusted by women in beauty and weight loss.\n Pumpkin helps to lose weight and fight obesity, which is very useful because it contains a lot of fibrous fiber, which is very beneficial for the intestines and digestive tract. Low thermogenesis, almost no fat content.\nBesides, pumpkin is also considered a famous food containing many nutrients that are good for the brain, helping to keep the eyes bright and the heart healthy. Most types of cucurbits mainly nurse seedlings before planting in the ground in order to make the plants stronger and increase the germination rate for the plants. The growth time of squash is from 2-3 months, depending on the variety.\nVarieties of gourd: Gourd swan, Gourd Ho Lo, Gourd Sao Lai\nPumpkin varieties: Lemon Pumpkin, White Flying Saucer, Multicolored Pumpkin, Long Fruit Green Pumpkin, Pumpkin gourd, Pinka Banana Pumpkin, Green Skin Pumpkin \n', '18'),
	('7. Bitter melon seeds (bitter gourd)', '  Bitter gourd has strong anti-inflammatory properties, purifies the liver, cures many diseases, is very easy to use. Bitter gourd has the effect of clearing heat and detoxifying, so it helps cool the liver, tonic liver, aids digestion, and improves bile secretion. Regular use of bitter melon can improve constipation, restore liver damage caused by cirrhosis and hepatitis.\n  Bitter melon is a plant that is not too picky about the season, in fact can be grown all year round. However, if planted at the right time, the melon will be delicious, fragrant and the highest yield. In the South, there will usually be 2 crops of melons: Winter-Spring and Spring-Summer. The North will usually sow around September, October and harvest until March and April next year.\n  Bitter melon (bitter gourd) after sowing 7-10 days will germinate, when the plant is 25-30cm tall, 5-6 true leaves and tassels appear, then plant it in a pot, plant and take care of it, about 45 -60 days can harvest. On the market, there are varieties of green bitter melon, forest bitter melon for you to choose to plant at home. \n', '18'),
	('8. Melon seeds', 'Melon is grown and harvested all year round. The time of planting melons is quite important to ensure that the tree can grow well and produce high yields when harvested. In the South, there are two main growing seasons of melons: Spring-Summer and Winter-Spring. In the North, the main growing season of melons is from December to May next year. The time from planting melon until harvesting is about 3 months, the time to plant and harvest melon lasts until September every year. \n', '18'),
	('9, Tomato seeds', '  Tomato is a popular fruit, appearing in almost every family\'s meal. Tomato is known as a nutritional powerhouse because it provides so many healthful ingredients. Eating tomatoes helps improve eyesight, prevent cancer, in addition to having beauty uses to help brighten skin, reduce blood sugar and help sleep.\n  Tomatoes are suitable for loose, humus-rich and well-drained soil. It is possible to sow seedlings, when the seedlings have 5-6 true leaves, 6-8cm high, then plant them in pots. After more than a month, the plant will start to flower. After 2 months, the fruit can be harvested.\n', '18'),
	('10. Okra Seeds', '  Okra contains many essential vitamins, minerals and nutrients for the body. Few people know that this small fruit has many health benefits such as treating coughs, sore throats, treating asthma, eating okra regularly helps improve eye health in addition to reducing stress. and help beautify the skin.\n  Okra is a crop that is suitable for fertile soil. Incubate the seeds to germinate or you can sow directly into the pot with a 1-2cm deep hole and then cover it. Water the seeds after 2-3 days of germination. When the tree has 2-3 true leaves, weeding, plowing, rooting and adding fertilizer. After 50-60 days, harvest. \n', '18');
    
    
    -- Img
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('hon_hop.jpg', '114 '),
	('phan_bon_vi_sinh.jpg', '107 '),
	('phan_dam.jpg', '111 '),
	('phan_kali.jpg', '113 '),
	('phan_lan.jbg', '112 '),
	('phan_rac.jpg', '104 '),
	('phanchuong.jpg', '103 '),
	('sinh_hoc_huu_co.jpg', '108 '),
	('cuc_huan_chuong.jpg', '122 '),
	('da_yen_thao.jpg', '125 '),
	('hoa_anh_thao.jpg', '123 '),
	('hoa_dau_biec.jpg', '126 '),
	('hoa_dong_tien.jpg', '124 '),
	('hoa_dua_can.jpg', '119 '),
	('title2.jpg', '147 '),
	('title3.jpg', '148 '),
	('title4.jpg', '149 '),
	('title5.jpg', '150 '),
	('title7.jpg', '152 ');
    
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('title8.jpg', '153 '),
	('title9.jpg', '154 '),
	('title11.jpg', '156 '),
	('title12.jpg', '157 '),
	('title16.jpg', '161 '),
	('title17.jpg', '162 '),
	('title19.jpg', '164 '),
	('title20.jpg', '165 '),
	('cuoicung.jpg', '166 '),
	('muop_dang.jpg', '168 '),
	('rau_muong.jpg', '170 '),
	('rau_cai.jpg', '171 '),
	('rau_xa_lach.jpg', '172 '),
	('rau_cai_xoan_kale.jpg', '173 '),
	('rau_mong_toi.jpg', '174 '),
	('bi_ngo_chuoi.jpg', '175 '),
	('bau_ho_lo.jpg', '175 '),
	('muop_dang.jpg', '176 '),
	('muop_huong.jpg', '177 ');
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('ca_chua.jpg', '178 '),
	('dau_bap.jpg', '179 ');
    
    
    select * from post;
    
    -- Design
    INSERT INTO post (title, post_img, post_category_id, status ) VALUES
	('Balcony Design ', 'vuon-ban-cong-nhat-ban-01.jpg', '3', '1 '),
	('Design Maximum Space Of A Small Garden ', 'max_design_25.jpg', '3', '1 '),
	('Design Your Garden To Look Like It\'s Professionally Designed ', 'thiet-ke-vuon-chuyen-nghiep-04.jpg', '3', '1 '),
	('Vertical Garden Design ', 'vuon_dung_01.jpg', '3', '1 '),
	('Modern Garden Design', 'thiet-ke-vuon-duong-dai-01.jpg', '3', '1 '),
	('Garden Design For Health ', 'thiet-ke-vuon-hop-suc-khoe_01.jpg', '3', '1 '),
	('Great Design For Small Garden ', 'thiet-ke-vuon-nho-02.jpg', '3', '1 '),
	('Impressive Garden Design For Your Terrace Area ', 'thiet-ke-vuon-dep-tren-san-thuong-03.jpg', '3', '1 '),
	('Herb Garden Design For City Housing ', 'cay_thao_moc_04.jpg', '3', '1 '),
	('Creative Garden Designs For Indoor Plants', 'trong-cay-trong-nha-04.jpg', '3', '1 '),
	('Gravel And Stone Design For Your Garden ', 'thiet-ke-vuon-bang-soi-da-06.jpg', '4', '1 '),
	('How to Harmonize Colors for the Garden ', 'chon-mau-sac-cho-vuon-02.jpg', '3', '1 '),
	('Hanging balcony garden plants ', 'ban-cong-chung-cu-dep-10.jpg', '4', '1 '),
	('DIY garden tools ', 'tai-che-chai-nhua-12.jpg', '4', '1 '),
	('Suitable balcony plant pots', 'chau_cay_07.png', '4', '1 '),
	('Miniature Garden Toys', 'mini_07.jpg', '4', '1 ');
    
    -- Topics
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. How to Create a Japanese Balcony Garden', 'In the Japanese garden, there is no room for the ordinary, the symmetrical, the sweet colors of fresh flowers or the chaos of the trees because the Japanese garden belongs to simplicity, nature and elegance.', '19 '),
	('2. The Importance of Symbols in the Japanese Garden', '2.1. Stone\nThe stone symbolizes stability and eternity. All stones should be of similar shape, appearance and texture,they should be placed in the same place in which they occur in nature, accepting shapes such as domes or semicircles.\n2.2. Water\n Water is a symbol of life. It brings dynamism and movement to the garden. Flows and waterfalls represent people. Free and peaceful rivers represent women. These two streams flow into the sea. The water in the area is replaced by an uneven light streak of gravel.\n2.3 Crops\nIn Japanese gardens, plants complement the entire garden. In addition, they must follow strict rules. The most important thing is the evergreen tree, which symbolizes longevity. The main color is green. Colorful flowers are used only once and not repeated.', '19 '),
	('3.Ornamental plants for Japanese gardens', '3.1. Flower Tree\nAsters, chrysanthemums, dahlias, geraniums, peonies, irises, dandelions and anemones (collected peonies).\n3.2. Shrubs and small trees\nRhododendron, jasmine, oxalis, ligustrum, wisteria, hydrangea.\n3.3. Green trees\nJapanese maple, ginkgo (Ginko Biloba), magnolia, cherry blossom, Japanese white pine, bamboo and pine. These plants are easy to grow in Japan. While choosing, remember to buy crops that are suitable for your land. If you want some advice on rocks in your garden, use gravel, stone instead of natural rock if your balcony is too small because it is suitable for small spaces.\n Water feature should be used in Japanese garden. The most desirable thing is a small stream of water, a waterfall using bamboo tubes, or bon sai.\nThis can be replaced with a fountain or a potted water garden. If you can\'t add water, add gravel, fine white sand in a pond or stream.\nFor flooring, use wooden flooring, also tie bamboo mats on the railings of your balcony, this will also provide a pumpkin stem feature to the garden.', '19 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. Planting plants in pots', 'The green of the leaves will make your garden space cool and airy.', '20 '),
	('2. Combine growing vegetables and herbs', 'Combining growing vegetables and herbs in 1 shelf will give you a diverse and colorful meal for the space of the garden.', '20 '),
	('3. Fill in the gaps that can be planted', 'A neglected sprinkler or an empty space in the garden you should also take advantage of growing herbs to fill the space.', '20 '),
	('4. Growing Climbers on the Wall', 'Grow bougainvillea plants so that they climb the walls you will see colorful life from your house', '20 '),
	('5. Mix many colors', 'For contrast and visual vibrancy, position the rounded barrel on the stairs and fill it with plants with interesting shapes,from scalloped geraniums to spiky, serrated aloe.\n Or, try combining upright leafy plants with some other variety that will add variety to the garden.', '20 '),
	('6. Use bags to plant', 'Hang an old shoe-like fabric over a fence or wall, then fill the compartments with dirt-inhaling plants like ferns or vines.', '20 '),
	('7. Take advantage of the porch, the way out', 'With a limited palette, like the pink and white flowers here, the collection is cohesive, not chaotic.', '20 '),
	('8. Unused wooden door slots', 'Lean shutters (old or new) against an outer wall and fill the slot with succulents or moss', '20 '),
	('9. Using pallets', 'Attach ceramic or earthen pots on pallets and you will make the most of the space to grow plants', '20 '),
	('10. Mini garden', 'Mini garden will create a sense of diversity for your garden.', '20 '),
	('11. Visual trick', 'By obscuring part of the yard with a curved fence it is possible to visually enlarge it. "You can\'t see the whole garden from any angle which is a plus"', '20 '),
	('12. Bed Garden', 'For gardens with bad soil, use bed gardens. They add layers to the space and help you solve soil problems.', '20 '),
	('13. Plant tall trees', 'Growing tall plants will make your garden feel bigger.', '20 '),
	('14. Planted in troughs', 'null', '20 '),
	('15. A green fence arrangement will create a larger open space', 'null', '20 ');
    
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('16. Planting on trays', 'null', '20 '),
	('17. Use a tub-shaped basin', 'Use a tub-like pot To contrast with terracotta pots, convert inexpensive galvanized steel washtubs into planters. Can grow herbs, basil, ..', '20 '),
	('18. The pot is like a bag mat', 'null', '20 '),
	('19. Planting leafy plants', 'Plants that have more leaves than flowers will make your garden full of green.', '20 '),
	('20. Planting trees in layers, layers', 'Using an old ladder to make shelves for pots, you will grow more plants thanks to this method', '20 '),
	('21. Grow lush, easy-to-grow plants', 'In large shady spots planting lush plants is a better choice than grasses', '20 '),
	('22. Build a wall', 'This stacked planting project is like an art installation, but has a more organized look with the classic wooden crate.', '20 '),
	('23. Building Color Layers', 'null', '20 '),
	('24. Plant a big tree next to the wall', 'A great idea if you\'re looking for tight spatial attachment', '20 '),
	('25. Reuse the Wardrobe', 'null', '20 '),
	('26. Using troughs', 'When you are stuck with a narrow space to grow vegetables, this is the perfect solution.', '20 '),
	('27. Reuse chairs', 'null', '20 '),
	('28. Creating miniatures', 'null', '20 '),
	('29. Grow plants by stacking pots into towers', 'null', '20 '),
	('30. Refresh shelves with a variety of colors', 'null', '20 '),
	('31. Hanging plants', 'null', '20 '),
	('32. Make use of the furniture', 'null', '20 '),
	('33. Use of tires', 'null', '20 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. Vision', 'The most important strategy when you start to tackle your garden is to have a clear vision of what you want.\n Know the theme or what you\'re going for and decide what to do yourself. And since "I theme" doesn\'t mean \'a lot of themes,\' trying to choose themes that are too difficult to do like a Star Wars garden or a Disney-themed garden can lead to disaster.\n Look needs to come from what appeals to you and from what you love', '21 '),
	('2. Looking for ideas', 'So how do you \'visualize\'? is very necessary to review and think clearly what you want.After a few hours of fun you should have dozens of images of great inspiration.', '21 '),
	('3. Option to build ideas', 'Now is the time to take a look at all the images and see the emerging patterns and themes. Do most of them look bright and modern? National park or luxury city? Messy or minimalist? \nThe really hard part comes now - throw off any board that doesn\'t fit the pattern. You should just leave a similar model and all the beautiful inspirational gardens.', '21 '),
	('4. Color rules', 'Next, look at the colors. Insiders know the rules: to get a truly stylish garden, just pay attention to three colors. So for the plants, pots, paints and anything else in the garden be absolutely strict. Which three colors are obvious from your note board? Which is running through most of the images?\nNow, I will always tend to lamps and lights (I\'ll cover why in more detail later), so for example, I usually go for gray, white and green as three. mine. If you add color you can swap orange for gray. But the rule of three colors will help you in choosing your plants, drawing options, opening options and accessories, painting the whole thing together.', '21 '),
	('5. Stylish walls', 'Designers will focus much of their work on boundaries. Whether it\'s walls, fences or trees. In most gardens when we look out it is the wall which is the most prominent thing that we see. It\'s such a big factor in the garden\'s makeup that it\'s necessary to get the walls working for you.\nSo take a really good look at your boundaries and make sure they fit the big plans. Replace or repaint if you can. But, however you deal with them, remember what large surface area you are dealing with thinking about how light and bright they will be, leading to the next vertex...', '21 '),
	('6. Light and Brightness', 'Designers know that above all, light is essential for good garden design. Any surface can absorb light or bounce. Walls and fences with their large surface area are crucial in your struggle to make the most of your light.\nThe whiter and reflective surfaces you have, the lighter and brighter the garden will look eye-catching. The red brick and dark tiled walls are real light suckers, while the colored or white painted wall lights bounce back the light and make the whole show look cleaner and brighter.', '21 '),
	('7. Rearrange', 'We all know it: arrangement is essential for design interface. Often we\'ve lived with a garden for so long we can\'t really see the garbage. A great way to look at it again is to take pictures of the garden and then look at those.\nOld pots or chairs randomly jump out with you, if it doesn\'t fit the new scheme - highlight it in bold and discard it', '21 '),
	('8. Rearrange as original', 'Then comes the weird part of the design - put some clutter back in! But choose your accessories with copper notes and your rule of three firmly in place. From seating, to outdoor lanterns, to water features, make sure they match the color and tone of your show. That\'s all starting to come together now. But now is the time to add other garden designer secret weapons', '21 '),
	('9. Specialized pots', 'Pots, like all other accessories, need to fit nicely within the color and visual rules of the design board. But the pots are really needed to get the whole thing off the ground. As large as possible, lined up within the rules or irregularities defined in your design and intentions, pots give structure to the garden and when filled with flowering plants, ornamental plants...', '21 '),
	('10. Personal mark - Highlights', 'A final element garden designers will often add a personal touch to the garden. A truly outstanding piece of furniture, one of those amazing or unexpected wall sculptures. We have the bright, bright, the colors are great, the pots are in place—perhaps now there\'s a risk of something fun.', '21 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. Planting materials', 'If you are renting and your house is not long-term attachment and the space where you live is very limited in sunlight, light items are easy to remove and can be moved around when the sun changes.', '22 '),
	('2. Notice the light and color of the tree', 'Depending on where you place the plants, they can absorb more or less light. While some plants need a lot of light, some like shade, so when planting, pay attention to arrange and classify them to create the best space for your plants to grow.', '22 '),
	('3. Choose the right planting location and pots', 'If you grow vines like squash, cucumbers, you should not choose small pots such as plastic bottles, in addition, pay attention to the growth stage of the plant that needs a place to cling and how you will harvest. when they bear fruit. Read each plant\'s growing instructions carefully and calculate their growth space before planting.', '22 '),
	('4. Stand height and weight', 'Consider choosing a reasonable height of the racks to avoid making them too high, making it difficult to irrigate, nor should they make the prices too low because they don\'t make full use of the growing space. If you have no other choice, invest in a pulley system so you can lower and raise your planting.', '22 '),
	('5. Plant hanging plants by the window', 'Since this is usually an elevated position, for safety reasons make sure they are securely fastened! Avoid heavy materials and use hard plastic or sturdy slings to avoid potential problems. Window boxes are often long and narrow and hanging baskets tend to hold only a small amount of soil so are best used as hanging plants.', '22 '),
	('6. Avoid encroachment of trees in the same area', 'Be careful with plants that have the ability to grow tassels, they can invade other plants\' spaces and stick to any surface. Planted too close to building walls, they can damage paint, wood, grout and other exterior materials.', '22 '),
	('7. Consider the maximum height of the tree and its ability to grow when it is mature.', 'This will have an impact on the type of support structure you choose and affect accessibility when watering, fertilizing, and pruning.\n Consider how tall they can be as you can comfortably reach!', '22 '),
	('8. Take advantage of the space that can be grown vertically', 'Avoid wasting walls and fences you can turn them into an art picture from plants. If you can\'t dig deep into a wall or fence, use hangers with plants at the top. Add a little creativity, arrange them scientifically and artistically will surely delight you.', '22 '),
	('9. Take into account the growth of the roots to choose the depth and area of the pot', 'They will ensure your plants grow and absorb the best nutrients', '22 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. Surface', 'Usually in modern garden design, the whole garden is tied together by a different context and linked together by a block. There is a water source, stone, bed garden and quality built-in planter that can be built into a garden with rendered walls and wooden bench inserts.The land has the benefit of good housing for a vigorous growth of plants. This also helps raise objects to eye level, where they can be appreciated more. If your budget can\'t design a unique garden, start with basic plants and then fill in the gaps.', '23 '),
	('2. Maintenance level', 'A modern garden is a low-maintenance garden. Because of this, a modern garden is designed in such a way that it will not be difficult to maintain. Self-watering method: planting and self-watering and the bed garden is very popular and the plants selected mostly very healthy, popular often using grasses. It\'s rare to see a modern garden planted with delicate flowers and part of the is to offer ease of maintenance.\nGravel and bark are used on top of weed proof carpets to reduce the need for weeding and custom built plantings or built in raised beds make it easier for the carpet to be locked. in place.', '23 '),
	('3. Diversity in vertical space', 'One thing people can easily overlook is changing the height of the landscape to take care of each level. Like an interesting natural landscape where the mountains in the distance get less obvious but as picturesque as they get closer to the horizon.\nWhat makes a flat horizon more interesting is that we can see more and more and when we look up or down when there are points to look at. The same principles apply on a modern garden design. As the height of the landscape and drift changes our attention.', '23 '),
	('4. Focus - Highlight', 'In our list of modern garden ideas, the idea of a focal point is essential. It is not only a point of contemporary garden design but one of the most basic principles in designing. A good design has a focal point that catches the viewer\'s eye, which also filters out less important features from there.\nThink of it as a graphic design, think what you like and then arrange all the details around it. A focal point can be anything from a modern planter, waterfall to a piece of sculpture. I have seen some really nice features like a tree placed in a large pot and located in a central place to make a statement.', '23 '),
	('5. Light', 'Garden design, night lighting is applied to give the garden a completely different look. By picking out areas of the garden with striking light and plant frames or design lines.\nSo there you\'ve got a quick look at what makes a great modern garden. There are obviously many other factors involved in its creation, but these 5 basic modern garden design ideas are the most essential. Keep them in mind if you are looking to design your own modern garden or to get a more modern feel in your existing garden.', '23 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. CREATE A SPACE TO LOOK IN THE GARDEN', 'It is really important to find a spot in your garden to enjoy the beauty and serenity it brings. Ignore the tired, stressful minutes in the office and bad emotions in the house, take time just to look at the flowers in the garden.\nStanding in a garden will make you uncomfortable, while sitting or lying down you will find it more comfortable and gentle than any other time. It gives you space and generates new ideas for you.\nThis idea comes from ancient medicine, which views the garden as a healthy environment. When you are sick or upset, you can smell the soothing aromas of herbs that bring you to a better mood.\nBest to do this at dusk - the time when the gardens are at their hottest and most fragrant. Nowadays. We don\'t take the time to enjoy these peaceful moments - our lives are focused on the busyness of the screens of computers and smartphones.\nInstead, you will feel magical if you lie on the grass (on a dry day), look up through the trees and watch the clouds pass. It\'s a form of meditation - it slows you down and helps you relax, allowing the healing process to begin.', '24 '),
	('2. GROWING BEES AND BUTTERFLIES', 'By incorporating planting that encourages wildlife, your garden will become a nest of butterflies and active bees. The best herb varieties to encourage bees, butterflies are those from florals, aromas such as lavender, mint, rosemary, thyme and sage', '24 '),
	('3. GROW SOMETHING TO LOOK ON THE KITCHEN TABLE', 'There is nothing more enjoyable than cultivating food production in your garden. This can be as simple as growing a salad plant to enjoy with loved ones. Sharing something at the table that you\'ve grown is an especially rewarding experience, and if you eat something you\'ve just harvested, the taste is at its best.', '24 '),
	('4. STARTING FROM SEEDS', 'Growing from seed is something that can be done on your own or as a great way for kids to join in the fun of gardening. What you get is time to observe the natural world. How happy you will be when you see a seed that grows and can be used in your meals. In today\'s modern world we have too little time to observe the world', '24 '),
	('5. DEVELOPMENT OF HERBALS, FLAVORING', 'If you have a small garden, air is a must and growing herbs is a guarantee of a soothing atmosphere. You can use them in the kitchen, they give your garden fragrance and color and are an attractive source of bees and butterflies. In addition, they also help repel insects such as mosquitoes. Mint is a plant that repels mosquitoes and mice. You can also eat herbs that are often used to make drinks. It\'s great to live a natural life. Then, when the flowers are ready to be seeded, you can use them in cooking or in tea. It is also a medicine for common ailments such as flu, hemostasis, cough, and cold', '24 ');
    
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. Use color and repetition to add depth to the garden', 'When choosing colors, you want to choose colors that will add depth to the garden. You want to choose cool colors like blue and purple for the border because it blends in and creates an illusion of a larger space. Choose warm colors like orange, red, and yellow to pop the space.\nRepeating certain colors will also tie spaces together and have an impact on your yard. When choosing plants for your garden, make sure you choose plants that will fulfill their purpose of repeating color in your space.\nChoose plants based on aesthetics. But also consider space needs, or how much time will you have for tree care and maintenance?Need shade? If yes, make sure to plant something to get a green tree that will have a lot of leaves.', '25 '),
	('2. Use tree floors to create multiple views for alcoves', 'You might be thinking, I want my yard to look bigger even though I have a small garden area right now! There are many ways to make a small yard or garden look bigger (some of them are listed here), but this should not be your only goal when designing your small garden.\nThink about the purposes you want your small garden to fulfill. Do you want the space to be comfortable as well as to be filled with greenery and color?\nYou can use the bed garden as a personal space to take advantage of the vertical space and bring your garden closer to eye level. Bed garden using bricks is a functional and efficient way of using space', '25 '),
	('3. Get creative with walking paths', 'Paving and installing the flooring diagonally creates the illusion of more space.\nUsing a diagonal or "S" curve instead of a shorter one, a straight walkway elongates a path making the entire space feel larger.', '25 '),
	('4. Use the Multi - Purpose feature', 'If you want space for entertaining or enjoying your professionally designed garden, you should consider building structural components that can accommodate multiple uses.\nFor example, a bench seat can be used as storage with a folding seat', '25 '),
	('5. Vertical gardens to maximize space', 'You probably have more space than you realize. With a small area, it is important to consider the often neglected vertical spaces. You can take advantage of this space by using a hanging planter that looks quite special with a tree floor, or install a trellis and train a climbing plant. Use window panes to brighten up the outside as well as the inside of your home.\nNot to mention the many options that are recycled from household items. For example, There is a lot of inspiration for how to use an old ladder. You can paint it and use it to keep potted plants.\nAnchor a palette to the wall and use it as a decorative plant, or check out all the ways you can use plastic bottles in your garden.Once you start planning your patio design and using all the resources and ideas out there, you\'ll find it\'s not too intimidating. In fact, you\'ll be more than willing to get stuck on creating a better space for your small garden!', '25 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('Impressive Garden Design For Your Terrace Area', 'If you are looking to create a rooftop garden or you want to renovate them for your own inspiration. Here are some design suggestions you can apply:\nTo design a beautiful garden, arrange everything neatly, do not use more than 3-5 colors on your terrace. Plan everything on paper, identify a theme that you want to create there.', '26 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. Choose the plants that you like and use the most', 'Gardening with herbs is easiest. A good start is half the job. Carefully think about what you want exactly. An herb garden (or any kind of garden) takes time, money and energy so it\'s good to know what you need before you get started.\nDo you eat a lot of basil, parsley, coriander or even thyme or rosemary? If you are not sure what you are using correctly. Once you get the answer, go ahead to buy vegetables for your garden or start them from seed to grow them.', '27 '),
	('2. Evaluate the space you have', 'Next, it is important that you choose a good place for your herb garden. That is of course completely dependent on available space. In a limited space like a window you should probably do this with a few pots.\nIt would be better if you had a balcony or roof terrace, all you set up and if you had a garden, the possibilities are pretty endless. What you should think about, especially if you need to work in a small space, is how much sunlight they get there.', '27 '),
	('3. Create vertical gardens', 'Vertical gardens are the best way to make the most of any space. Use walls, railings and ceilings to hang plants. \nYou can create hanging shelves where you can put small pots. Another attractive solution is to make pallets or use a shoe rack.If you are growing herbs indoors buying a herb garden set is also a good idea.', '27 '),
	('4. Grow a variety of plants', 'Planting more than one herb indoors will help keep your house leafy all year round. Grow an extra flower or vegetable if possible. A lemon tree or a dwarf fruit tree. The possibilities are endless. You can also start growing your favorite vegetables', '27 '),
	('5. Create shade for trees when it\'s too sunny', 'Plants like sunlight. But each plant\'s need for sunlight is different. Herbs usually don\'t need a lot of sun. If you see a sunny day for too long, provide some shade for the plant. Too much sun can dry out herbs and die, herbs like cilantro bolts in warm temperatures in the sun will scorch.', '27 '),
	('6. Make a seat or lie down in your herb garden', 'The herb garden looks beautiful and has the aroma of herbs that will make it a great place to sit and rest. If you have grown some flowers and shrubs, you can enjoy it even more. So it is a good idea to create a nice place to rest.', '27 '),
	('7. Use Herbs', 'You can use herbs for cooking or making drinks. Growing herbs indoors is a great way to have herbs in the kitchen so you can use them while cooking conveniently.', '27 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('null', 'Like the days in the fall and winter when the cold air begins to surround you or plan to grow vegetables to provide food for the family during Tet. Instead of spending time going to the market to buy the necessary food, take advantage of the space in your home to have a source of green, clean and fresh food right at home.\nHowever, some people think that modern life in cities is difficult to grow clean vegetables, this is not difficult', '28 '),
	('Growing lettuce at home', 'Thanks to modern technology and new innovation there are some really cool ways to grow greens at home', '28 '),
	('New home garden system', 'null', '28 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('null', 'Are you learning about how to design a garden using gravel? Gravel is a great material for garden design because it is close to nature. They are easy to find and can be painted with your favorite color.\nToday, trees and pebbles are becoming more and more popular in garden designs, as they are easy to maintain and can create unique designs in a variety of ways. You can imagine that your yard decorated with cobblestone will be more attractive and beautiful, and will surely leave an unforgettable impression on guests who come to visit your home.', '29 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. Size', 'What is your garden type? What is the size of your garden? Record its details, it\'s important because there\'s a rule to follow: always remember, if your garden is small use only 3 or 4 shades of color. If your garden is large, you can use up to 5 shades of color, but never overdo it, otherwise your garden will be messy.', '30 '),
	('2. Mood', 'Warm colors are red, orange, yellow, purple, they represent energy and life; while cold color is white, pink, blue, green, gray; \nThey represent calm and peace. Use them according to the mood you want to create in your garden.', '30 '),
	('3. Use opposite colors', 'The growing red geraniums have white petals that leave a warm and vibrant effect, but there\'s something cool about it, creating a very special atmosphere for your garden?\nYou can use vibrant colors - warm colors, combined with elegant colors - cool colors. Although the best option is to go for neutrals, use warm and cool tones alike, to get the best results.', '30 '),
	('4. Facility', 'Consider not only the paint colors on your walls, but also the ground or floor and the climate where you live. Use dark colors in the highlights, bright colors in the dark spots and shadows to accentuate them.', '30 '),
	('Additional tips', '1. Allow your garden to air out, don\'t clutter it with lots of colors and fancy pots with too many colors, accessories and garden furniture.\n2. Don\'t ignore your favorite color; Apply it wherever you can, be creative.\n3. Use bright colors and remember a right pot according to its background', '30 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('null', 'When you decorate an apartment balcony, it is indispensable to have an index of space that is to hang flowers or mini plants, on both sides of the wall, there are some beautiful flower hanging samples that you can refer to in our article. .', '31 '),
	('null', 'The wall area on both sides of the balcony can be decorated with a number of popular styles such as wall cladding with natural stone, decorating with wooden or wood plastic composite flower trusses, or making a Japanese-style bamboo flower truss.', '31 '),
	('null', 'Each style has its own and different beauty, there are many people who like stone cladding because it is clean and luxurious, some people like to make a wooden plastic composite net, because it is new and modern in European style. Europe, but also many customers like to make flower trusses with bamboo, an element of Japanese garden style, it carries elements, traditions of classical folk style.', '31 '),
	('null', 'Flower hangers also come in a variety of shapes and sizes, and we\'ll also showcase a variety of flower hangers with illustrations', '31 '),
	('null', 'Even the wall cladding from natural stone has many different models, wall cladding with one-color stone, two-color stone, honeycomb stone ...', '31 '),
	('null', 'Decorative truss has trellis-style truss, cast iron truss, pom-shaped truss…', '31 ');
    
    INSERT INTO topics (topic_name, content, post_id ) VALUES
	('1. Turn Coca-Cola Bottles into Super Cute Hello Kitty Pots', 'null', '32 '),
	('2. Reuse Ladders into Potted Shelves', 'null', '32 '),
	('Natural Stone Pebbles', 'null', '29 '),
	('Polished Stone Pebbles', 'null', '29 '),
	('1. Cement balcony pots', 'In recent years, cement pots seem to have always mastered their position and are commonly used in offices, houses, cafes, restaurants ... although they have a simple design, pure gray colors but That is why the cement pot creates a striking beauty that is unmistakable. In particular, when combining this pot to plant trees, the space will bring a fancy European classic.', '33 '),
	('2. Balcony plants - grinding stone pots', 'Grinding stone pots belong to the top of the most popular pots for looking after plants today. In the composition of grinding stone pots, the main ingredients are cement combined with stone sand, adhesives, waterproofing ...\nFrom there, they create a perfect balcony planter in both durability and quality so that the flower plant can grow at its best. Besides, grindstone pots are often used to decorate balconies in modern and luxurious spaces. In addition, you can also take advantage of it to grow indoor plants as well.', '33 '),
	('3. Plastic pots planted plants on the balcony', 'Through the advanced production process, plastic pots are now very diverse in style and size. There are many types of pots designed to suit each balcony space and crops such as balconies, hangers or pots placed on shelves, iron prices.\nBesides, balcony plastic pots can be designed to attach to the wall or balcony. Cleaning pots or changing soil for plants will also become much easier.', '33 '),
	('4. Balcony sedge pots', 'With the current nostalgic trend today, the trend of decorating trees with sedge baskets is becoming more and more popular in Vietnam. Soms have a rustic beauty, environmentally friendly but no less convenient. Currently, the basket is often handmade by hand with a variety of sizes. Depending on the needs and purposes, you choose the most suitable size and style! In addition to planting trees and baskets, it can also become an extremely convenient storage compartment. For your balcony!', '33 '),
	('5. Composite Plant Pots', 'Composite pots have the main ingredient of plastic, fiberglass and limestone fiber. Currently, there are many composite pots from traditional to modern sold on the market. This product is very suitable for planting ornamental plants on the balcony, giving you the creation of balcony space. Each type of composite pot will be suitable for different crops.', '33 '),
	('6. Balcony planters - Terracotta pots', 'Terracotta pots are shaped and patterned created on clay. They are mostly handmade and neutralized colors, very suitable for those who pursue nostalgic style.', '33 '),
	('7. Porcelain pots look balcony', 'Porcelain pots are made from clay in the form of kaolin, also known as crystal form with modern beauty and luxury, very suitable for growing ornamental plants with tall shapes and small stems such as cypress bamboo, Japanese bamboo, areca palm ... Porcelain pots are very commonly used for decoration in offices, for tables or for flooring. With a variety of designs, colors, and sizes, this type of balcony planter can suit a variety of plants and design ideas. Besides, porcelain planters have very good moisture retention, so they are especially suitable for moisture-loving plants.', '33 '),
	('8.Coconut fiber pots hanging on the balcony', 'This type of balcony plants is quite special when made from coconut bark. Coconut fiber pots have good insulation, helping plants from external temperature. High drainage and good moisturizing ability will create favorable conditions for plants to grow. In case you don\'t want to use pots anymore, instead of throwing away, bury them on the ground. Because when the pot decomposes, it will form nutrients for the soil.', '33 '),
	('9. Hanger pots, mounting pots for balconies', 'This is one of the types of balcony planters suitable for balconies with small areas. Hanging pots will take advantage of the space in the wall or overhead to adorn the balcony without taking up much space. Balcony pots with a variety of designs and designs will help you make an easier choice. The tasteless blank walls will become more vivid and sophisticated, allowing you to freely express your creativity and taste.', '33 '),
	('10. Wooden pots for plants', 'The wooden balcony planter is made from natural materials, so it is completely environmentally friendly. They are lightweight, so it is easy to move around when decorating a balcony. Moreover, this type of pot is also popular thanks to its good moisture retention, heat resistance, and cold resistance, so it is very suitable for growing plants and flowers.', '33 '),
	('null', 'The next garden trend combines the joy of gardening with the magic of miniatures. Create your own tiny living world (Terrarium / Miniature Garden) using our wide range miniatures. Garden Miniatures are small puppets / toys used to decorate the pots/plants. This gives an enrich look and feel.\nAnything in miniatures are sooo cute...\nHappiness is watching your plant starting to grow with an added beauty of miniature garden toys.', '34 ');
    
    -- img
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('vuon-ban-cong-nhat-ban-01.jpg', '180 '),
	('vuon-ban-cong-nhat-ban-02.jpg', '181 '),
	('vuon-ban-cong-nhat-ban-03.jpg', '182 '),
	('max_design_01.jpg', '183 '),
	('max_design_02.jpg', '184 '),
	('max_design_03.jpg', '185 '),
	('max_design_04.jpg', '186 '),
	('max_design_05.jpg', '187 '),
	('max_design_06.jpg', '188 '),
	('max_design_07.jpg', '189 '),
	('max_design_08.jpg', '190 '),
	('max_design_09.jpg', '191 '),
	('max_design_10.jpg', '192 '),
	('max_design_11.jpg', '193 '),
	('max_design_12.jpg', '194 '),
	('max_design_13.jpg', '195 '),
	('max_design_14.jpg', '196 '),
	('max_design_15.jpg', '197 '),
	('max_design_16.jpg', '198 ');
    
  INSERT INTO topics_img (img_url, topic_id ) VALUES
	('max_design_17.jpg', '199 '),
	('max_design_18.jpg', '200 '),
	('max_design_19.jpg', '201 '),
	('max_design_20.jpg', '202 '),
	('max_design_21.jpg', '203 '),
	('max_design_22.jpg', '204 '),
	('max_design_23.jpg', '205 '),
	('max_design_24.jpg', '206 '),
	('max_design_25.jpg', '207 '),
	('max_design_26.jpg', '208 '),
	('max_design_27.jpg', '209 '),
	('max_design_28.jpg', '210 '),
	('max_design_29.jpg', '211 '),
	('max_design_30.jpg', '212 '),
	('max_design_31.jpg', '213 '),
	('max_design_32.jpg', '214 '),
	('max_design_33.jpg', '215 '),
	('null', '216 '),
	('thiet-ke-vuon-chuyen-nghiep-02.jpg', '217 ');
    
    INSERT INTO topics_img (img_url, topic_id ) VALUES
	('null', '218 '),
	('thiet-ke-vuon-chuyen-nghiep-04.jpg', '219 '),
	('null', '220 '),
	('thiet-ke-vuon-chuyen-nghiep-06.jpg', '221 '),
	('null', '222 '),
	('null', '223 '),
	('null', '224 '),
	('null', '225 '),
	('vuon_dung_01.jpg', '226 '),
	('vuon_dung_02.jpg', '227 '),
	('vuon_dung_03.jpg', '228 '),
	('vuon_dung_04.jpg', '229 '),
	('vuon_dung_05.jpg', '230 '),
	('vuon_dung_06.jpg', '231 '),
	('vuon_dung_07.jpg', '232 '),
	('vuon_dung_08.jpg', '233 '),
	('vuon_dung_09.jpg', '234 '),
	('thiet-ke-vuon-duong-dai-01.jpg', '235 '),
	('thiet-ke-vuon-duong-dai-02.jpg', '236 ');
    
    
    INSERT INTO topics_img (img_url, topic_id ) VALUES
	('thiet-ke-vuon-duong-dai-03.jpg', '237 '),
	('thiet-ke-vuon-duong-dai-04.jpg', '238 '),
	('thiet-ke-vuon-duong-dai-05.jpg', '239 '),
	('thiet-ke-vuon-hop-suc-khoe_01.jpg', '240 '),
	('thiet-ke-vuon-hop-suc-khoe_02.jpg', '241 '),
	('thiet-ke-vuon-hop-suc-khoe_03.jpg', '242 '),
	('thiet-ke-vuon-hop-suc-khoe_04.jpg', '243 '),
	('thiet-ke-vuon-hop-suc-khoe_05.jpg', '244 '),
	('thiet-ke-vuon-nho-01.jpg', '245 '),
	('thiet-ke-vuon-nho-02.jpg', '246 '),
	('thiet-ke-vuon-nho-03.jpg', '247 '),
	('null', '248 '),
	('thiet-ke-vuon-nho-05.jpg', '249 ');
    
    INSERT INTO topics_img (img_url, topic_id ) VALUES
	('thiet-ke-vuon-dep-tren-san-thuong-01.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-02.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-03.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-04.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-05.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-06.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-07.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-09.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-10.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-12.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-13.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-15.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-16.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-17.jpg', '250 '),
	('thiet-ke-vuon-dep-tren-san-thuong-19.jpg', '250 ');
    
    INSERT INTO topics_img (img_url, topic_id ) VALUES
	('cay_thao_moc_01.jpg', '251 '),
	('cay_thao_moc_02.jpg', '252 '),
	('cay_thao_moc_03.jpg', '253 '),
	('cay_thao_moc_04.jpg', '254 '),
	('null', '255 '),
	('cay_thao_moc_06.jpg', '256 '),
	('cay_thao_moc_07.jpg', '257 '),
	('trong-cay-trong-nha-01.jpg', '258 '),
	('trong-cay-trong-nha-02.jpg', '259 '),
	('trong-cay-trong-nha-03.jpg', '260 '),
	('trong-cay-trong-nha-04.jpg', '258 '),
	('trong-cay-trong-nha-05.jpg', '258 '),
	('trong-cay-trong-nha-06.jpg', '260 '),
	('trong-cay-trong-nha-07.jpg', '258 '),
	('trong-cay-trong-nha-08.jpg', '260 ');
    
    INSERT INTO topics_img (img_url, topic_id ) VALUES
	('thiet-ke-vuon-bang-soi-da-02.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-03.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-04.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-05.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-06.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-07.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-08.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-10.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-13.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-14.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-15.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-18.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-20.jpg', '261 '),
	('thiet-ke-vuon-bang-soi-da-24.jpg', '261 ');
    
    
    INSERT INTO topics_img (img_url, topic_id ) VALUES
	('chon-mau-sac-cho-vuon-01.jpg', '262 '),
	('chon-mau-sac-cho-vuon-02.jpg', '263 '),
	('chon-mau-sac-cho-vuon-03.jpg', '264 '),
	('chon-mau-sac-cho-vuon-04.jpg', '265 '),
	('mau-sac-2017-01.jpg', '266 '),
	('mau-sac-2017-02.jpg', '266 '),
	('mau-sac-2017-03.jpg', '266 '),
	('mau-sac-2017-04.jpg', '266 '),
	('mau-sac-2017-05.jpg', '266 '),
	('mau-sac-2017-06.jpg', '266 '),
	('mau-sac-2017-07.jpg', '266 '),
	('mau-sac-2017-08.jpg', '266 '),
	('mau-sac-2017-09.jpg', '266 '),
	('mau-sac-2017-10.jpg', '266 '),
	('ban-cong-chung-cu-dep-04.jpg', '267 '),
	('ban-cong-chung-cu-dep-05.jpg', '268 '),
	('ban-cong-chung-cu-dep-06.jpg', '269 '),
	('ban-cong-chung-cu-dep-07.jpg', '270 ');
    
    
    
    INSERT INTO topics_img (img_url, topic_id ) VALUES
	('ban-cong-chung-cu-dep-08.jpg', '271 '),
	('ban-cong-chung-cu-dep-09.jpg', '272 '),
	('ban-cong-chung-cu-dep-10.jpg', '268 '),
	('tai-che-chai-nhua-01.jpg', '273 '),
	('tai-che-chai-nhua-12.jpg', '273 '),
	('tai-su-dung-thang-cua-trong-lam-vuon-06.jpg', '274 '),
	('tai-su-dung-thang-cua-trong-lam-vuon-07.jpg', '274 '),
	('soi_01.png', '275 '),
	('soi_02.png', '275 '),
	('soi_03.png', '275 '),
	('soi_04.png', '275 '),
	('soi_05.png', '275 '),
	('soi_06.png', '275 '),
	('soi_07.png', '275 '),
	('soi_08.png', '275 '),
	('soi_09.png', '276 '),
	('soi_10.png', '276 '),
	('soi_11.png', '276 '),
	('chau_cay_01.png', '277 ');
    
    INSERT INTO topics_img (img_url, topic_id ) VALUES
	('chau_cay_02.png', '278 '),
	('chau_cay_03.png', '279 '),
	('chau_cay_04.png', '280 '),
	('chau_cay_05.png', '281 '),
	('chau_cay_06.png', '282 '),
	('chau_cay_07.png', '283 '),
	('chau_cay_08.png', '284 '),
	('chau_cay_09.png', '285 '),
	('chau_cay_10.png', '286 '),
	('mini_01.jpg', '287 '),
	('mini_02.jpg', '287 '),
	('mini_03.jpg', '287 '),
	('mini_04.jpg', '287 '),
	('mini_05.jpg', '287 '),
	('mini_06.jpg', '287 '),
	('mini_07.jpg', '287 '),
	('mini_08.jpg', '287 '),
	('mini_09.jpg', '287 '),
	('mini_10.jpg', '287 ');
    
    INSERT INTO topics_img (img_url, topic_id ) VALUES
	('mini_11.jpg', '287 ');
    
    
    -- Cong cụ
    INSERT INTO post (title, post_img, post_category_id, status) VALUES
	('Some necessary tools when taking care of the garden at home ', '1201403.jpg', '5', '1');
   
    -- Topics
    INSERT INTO topics (topic_name, content, post_id) VALUES
	('1. Fly for gardening', 'Loosen the soil, dig small holes, use for planting and weeding, mixing fertilizers and other additives. Used to move plants into pots or vases. \n', '35 '),
	('2. Handheld Pressure Sprayer', 'The Pressure Sprayer has a multi-purpose watering head for watering ornamental plants and flowers. Pressure sprayers are also used to spray solutions of stimulants, pesticides and other solutions on plants and flowers. \n', '35 '),
	('3. Rake the Land for Planting', 'Rake is used to level the surface of the soil after plowing, loosening the soil, cleaning grass, garbage, and dry leaves in the soil. In addition, the small rake is also used to sift the piles of rice, corn and grain to the yard to dry on sunny days. \n', '35 '),
	('4. Hand Saw', 'A hand saw is an effective tool for removing large branches that cannot be cut by pliers. The garden saw is small in size, easy to hold in the hand. Should choose a type with a fixed and foldable blade, both compact and safe to keep in your home. \n', '35 '),
	('5. Garden Hoe', 'Garden hoe is used to dig up the soil, clean the grass, dig holes, dig planting holes, dig up trees, move trees. \n', '35 '),
	('6. Garden Knife', 'Garden knife is curved design with a length of 18cm. Garden knives are very compact and easy to use at all times. The handle is 10cm long enough for you to hold comfortably with one hand, the finger groove design helps you to hold the knife firmly. \n In the process of gardening, you need a pocket knife designed with gardening in mind. Garden knife with curved blade, kite tip to help you cut, cut, peel everything easily and quickly. \n', '35 '),
	('7. Garden Gloves', 'Garden gloves help protect your hands during gardening from dirty soil, chemicals from fertilizers, pesticides, herbicides and avoid injury due to collisions with sharp objects, branches. during gardening. \n', '35 '),
	('8. Bonsai Pruning Scissors', 'Ornamental pruning shears help you to trim ornamental plants, trim foliage to shape, trim tree art, trim tree hedges, cut grass... \n', '35 ');
    
INSERT INTO topics_img (img_url, topic_id ) VALUES
	('1201401.jpg', '288 '),
	('1201402.jpg', '289 '),
	('1201403.jpg', '290 '),
	('1201404.jpg', '291 '),
	('1205405.jpg', '292 '),
	('1206406.jpg', '293 '),
	('1201407.jpg', '294 '),
	('1201408.jpg', '295 ');
    
        INSERT INTO topics_img (img_url,topic_id)
        VALUES 
        ('null',101),
        ('null',102),
        ('null',105),
        ('null',106),
        ('null',109),
        ('null',110),
        ('sautieude.jpg',115),
        ('phandau.jpg',116),
        ('null',117),
        ('land1.jpg',118),
        ('hoa_sao_nhai.jpg',120),
        ('hoa_huong_duong_lun.jpg',121),
        ('hoa_thach_thao.jpg',127),
        ('land1.jpg',128),
        ('null',129),
        ('land3.jpg',130),
        ('null',131),
        ('land7.jpg',132),
        ('land8.jpg',133),
        ('null',134),
        ('null',135),
        ('null',136),
        ('null',137),
        ('andomec.jpg',138),
        ('null',139),
        ('binhtox.jpg',140),
        ('kuraba.jpg',141),
        ('pethian.jpgl',142),
        ('null',143),
        ('null',144),
        ('null',145),
        ('null',146),
        ('null',151),
        ('null',155),
        ('null',158),
        ('null',159),
        ('null',160),
        ('null',167),
        ('null',169);
        
    -- Product    
	INSERT INTO product_type (product_type_name) VALUES
	('Land '),
	('FERTILIZER - Pesticide, fungicides '),
	('SEEDS '),
	('PLANT POTS '),
	('Balcony DECORATION '),
	('Equiment to doing garden ');
    
    INSERT INTO product (product_name, product_imt, product_type_id ) VALUES
	('Organic compacted soil', 'dat_01.jpg', '1 '),
	('Treated coco peat, specializing in growing vegetables, crops, strawberries, fruit trees, hydroponics', 'dat_02.jpg', '1 '),
	('Sfarm whole-winged rice husk, 5dm3 bag, no impurities. Used for hydroponics, sprouts, seedling nursery', 'dat_03.jpg', '1 '),
	('Masato mineral stone, specializing in spreading ornamental leaves, cactus, deep lotus color, many sizes to choose from', 'dat_04.jpg', '1 '),
	('Longlife Greenhome fresh flower care, 5g pack, long lasting, big bloom, no water smell', 'phan_05.jpg', '2 '),
	('NPK 30-9-9 Minro fertilizer, 200gr bag, supports fast growth of stems, branches, leaves, roots', 'phan_06.jpg', '2 '),
	('Atonik plant growth stimulant, 10ml pack, specializing in orchids, roses, ornamental plants', 'phan_07.jpg', '2 '),
	('Cinnamon seeds, 2g pack, basil, good growth, good disease resistance, fast harvest G07', 'hat_08.jpg', '3 '),
	('Rose seeds', 'hat_09.jpg', '3 '),
	('Ten o\'clock flower seeds', 'hat_10.jpg', '3 '),
	('Gerbera seeds', 'hat_11.jpg', '3 '),
	('Japanese planter pots, Daiwa, school tiles, balcony flowers, garden, 5-year durability, many sizes', 'chau_12.jpg', '4 '),
	('Wooden planter pots, rectangular, Melaleuca wood, water resistant, easy to assemble, delicate, aesthetic, high finishing', 'chau_13.jpg', '4 '),
	('Orchid plastic pot, R15xC10cm, ceramic color, durable, beautiful, anti-fall, good price', 'chau_14.jpg', '4 '),
	('LED Fairy Lights, 1 meter, 3 brightness modes, Included battery, convenient, water resistant, no power consumption', 'design_15.jpg', '5 '),
	('Solar LED light, R8xC4.5cm, warm yellow light, waterproof, balustrade, outdoor decoration', 'design_16.jpg', '5 '),
	('Climbing rose frame, Japan, C120xR20cm, Daim,, bird cage shape, easy to assemble, 5 years outdoor durability, many sizes', 'design_17.jpg', '5 '),
	('Tramontina spray', 'dc_18.jpg', '6 '),
	('Pliers for cutting branches with protective sheath', 'dc_19.jpg', '6 ');
    
    
	INSERT INTO product (product_id, product_name, product_imt, product_type_id ) VALUES
	('20', 'Tramontina garden tool kit x3', 'dc_20.jpg', '6 ');
    
    INSERT INTO product_detail (product_name, descriptions, price, product_id ) VALUES
	('Organic compacted soil', 'Large cake organic compacted soil is the perfect substitute for clean, disinfected and bactericidal soil, disease resistant for plants, helps roots develop, creating a premise for flowering and fruiting.\nEasy to move., available nutrients, volcanic microorganisms are good natural enemies for plants.\nUsing coco peat media tablets, you do not need to add fertilizer, but the plant is still nutritious enough to grow. However, to ensure the best growth, you can add fertilizer or mix new coco peat pellets after 40-50 days.\nIf growing sprouts, 7 days you have harvested. And it is also possible to reuse the sprouts for the second time. Just after harvesting, you have to work hard to uproot the old sprouts, dig again and sow the seeds of the next generation of sprouts.', '20.000', '1 '),
	('Treated coco peat, specializing in growing vegetables, crops, strawberries, fruit trees, hydroponics', 'Treated coco peat is easy to absorb water, retains moisture well, drains quickly, is resistant to pests, does not grow weeds…\nTreated coco peat increases the ability to exchange ions in the soil, helps the soil to be porous, breathable, facilitates the growth of plant roots, absorbs nutrients well, and the processed product is ready to use. right\nUsed to mix with soil to increase moisture, create conditions for porous soil, stimulate fast rooting.\nTreated coco peat is the raw material for the production of microbial organic fertilizer to effectively improve the degraded soil.', '19.000', '2 '),
	('Sfarm whole-winged rice husk, 5dm3 bag, no impurities. used for hydroponics, sprouts, seedling nursery', 'Whole-winged rice husk as growing medium: suitable for plants in potted trays or nursery seedlings. Typically as a growing medium for orchids, roses, succulents, porcelain flowers, ornamental plants, etc. Ensure porosity, ventilation, pathogen-free and good drainage.\nWhole-winged rice husk fertilizes plants: Combines with other materials such as melon humus, organic fertilizer, vermicompost... to provide organic nutrients for plants.\nWhole-winged rice husk fertilizes plants: in the flowering and fruit-growing stage, rice husks are used in combination with organic fertilizers to provide more potassium for plants. Enhances the color of flowers and enhances the flavor of the fruit', '6.000', '3 '),
	('Masato mineral stone, specializing in spreading ornamental leaves, cactus, deep lotus color, many sizes to choose from', 'Is a natural mineral rock, with medium alkalinity, similar to volcanic rock. Considered a non-toxic, harmless and biologically active medicinal stone. Through an electron microscope, it can be seen that Masato stone has many holes. Oxygen is released from countless small holes in the stone.\nMasato spread the pot surface beautifully: Masato is hard and heavy, so it is loved by the succulent community because it is difficult to blow away.\nMasato stone itself is yellow, when watered, the more iridescent it is, the more the pot shines in the sun. for plants up to 50%, while converting water into minerals necessary for plants. Along with the care that focuses on light, water, temperature and nutrition, Masato will help the succulents to become durable and beautiful.', '40.000', '4 '),
	('Longlife Greenhome fresh flower care, 5g pack, long lasting, big bloom, no water smell', 'Long Life flower care improves the quality and prolongs the life of fresh flowers from a consumer perspective (up to 14 days).\nLong Life long-lasting flower care helps flowers stay fresh longer, prevents leaves from turning prematurely and protects flowers from being attacked by other microorganisms during flower arrangement in the vase.\nLong Life long-lasting flower care keeps water clean and odor-free for 14 days. So users do not need to change the water for the vase or prune the root while arranging flowers.', '4.000', '5 '),
	('NPK 30-9-9 Minro fertilizer, 200gr bag, supports fast growth of stems, branches, leaves, roots', 'Help plants grow, develop leaves, stems. Help seedlings grow and recover trees after harvest.\nIncrease resistance and resistance to pests and diseases.\nHelp large fruit, large flowers with beautiful colors, strong roots.\nSuitable for ornamental flowers and leafy vegetables.', '63.000', '6 '),
	('Atonik plant growth stimulant, 10ml pack, specializing in orchids, roses, ornamental plants', 'Plant growth stimulant ATONIK stimulates plant growth, increases rooting, germination, and increases the ability to produce new shoots after harvest. Suitable for the growth stage of orchids such as dendro orchid, mokara orchid...\nAtonik is a new generation plant growth stimulant. Like vitamins, Atonik increases growth. At the same time, it helps the plant to avoid the bad effects caused by unfavorable growth conditions.\nAtonik has the effect of increasing the ability to root, germinate, increase the ability to produce new shoots after harvest. In addition, Atonik also increases the growth, flowering and fruiting of crops. Especially to increase productivity and quality of agricultural products.', '63.000', '7 '),
	('Cinnamon seeds, 2g pack, basil, good growth, good disease resistance, fast harvest G07', 'Cinnamon is a type of coriander that can be grown all year round, strong and easy to grow, strong growth, good disease resistance. Purple stem, large round leaves, green color, pleasant aroma. Large leaf cinnamon seeds have strong growth ability, uniform germination and quality. - Large leaf cinnamon is often used in meals for soups, helps or is eaten raw with other vegetables. In addition, large leaf cinnamon is also used in the preparation of medicinal herbs.', '12.000', '8 '),
	('Rose seeds', 'Climbing roses bring natural beauty, serenity and lightness. Vibrant flower colors create a beautiful highlight for the space around the house.', '32.000', '9 '),
	('Ten o\'clock flower seeds', 'Especially the ten o\'clock flower seeds are very easy to plant and care for. You just need to sprinkle the seeds on the ground and after about a month, the plant will grow and flower colorfully, creating outstanding beauty for a small corner of the garden or a sunny balcony...', '25.000', '10 '),
	('Gerbera seeds', 'In order for seeds to grow quickly, you should choose fertile, well-drained soil, where there is a lot of humus. Provide regular moisture for the seeds to grow quickly. - Gerbera does not tolerate a lot of rain, frost and or too much light. Therefore, you should build a trellis, use a black net to shield the tree from rain and sun. Always keep the substrate moist throughout the growing process.', '27.000', '11 '),
	('Japanese planter pots, Daiwa, school tiles, balcony flowers, garden, 5-year durability, many sizes', 'Durability for use up to 5 years.\nDaiwa Plastics pots use virgin plastic material, thick and durable for a long time despite being exposed to the constantly changing weather outdoors.\nThe pot material is safe, does not produce Toxic substances seep into the soil, affecting plants, flowers and users\' health.\nDesigned in a pretty and elegant pot, it can be planted with ornamental plants or drooping flowers. Pots make your space more impressive and beautiful.', '223.000', '12 '),
	('Wooden planter pots, rectangular, Melaleuca wood, water resistant, easy to assemble, delicate, aesthetic, high finishing', 'Wooden planter pots Bring a rustic look to the growers.- Made from natural Melaleuca wood that has been treated against mold and termites, with 2 layers of PU to ensure durability to withstand all weather- Product The product is assembled from 5 separate pieces, the pieces are delicately handled when linked into a solid block, rust-proof screws link the details to ensure the pot is durable over time. easy.', '145.000', '13 '),
	('Orchid plastic pot, R15xC10cm, ceramic color, durable, beautiful, anti-fall, good price', 'The fake terracotta orchid planter is manufactured from quality plastic, designed with ventilation holes at the bottom and around the pot.\nSuitable for growing orchids and ornamental plants, especially Monkara, Denrobium orchids. ,...\nReplacement for terracotta pots inherently fragile.\nWaterproof, has the advantage of preventing fungal growth and harming plants.\nCheap price, easy to switch pots when exporting. .', '25.000', '14 '),
	('LED Fairy Lights, 1 meter, 3 brightness modes, included battery, convenient, water resistant, no power consumption', 'Battery-operated firefly lamp The light cord is made of copper, can be bent flexibly, easy to style, you can design the string according to your favorite style.\nWaterproof copper wire, you can use it even When it rains \nFirefly lights light up continuously, support flashing.', '18.000', '15 '),
	('Solar LED light, R8xC4.5cm, warm yellow light, waterproof, balustrade, outdoor decoration', 'Save money on electricity costs, eco-friendly.\nThe solar light is made of high quality ABS material and has an IP65 waterproof rating, which can withstand snow, rain and other extreme weather conditions.\nSolar floor lights run on solar energy and cost no lighting costs. It will automatically light up at night and automatically charge under the sun. Its high quality solar panel can realize high conversion efficiency, long life and energy saving.', '320.000', '16 '),
	('Climbing rose frame, C120xR20cm, Daim,, bird cage shape, easy to assemble, 5 years outdoor durability, many sizes', 'The tube can be reused many times, withstands outdoors up to 5 years and is environmentally friendly.- The product is made of reinforced plastic with a plastic surface, with steps to help climbing plants. - Various sizes meet the requirements. meet all needs.- Suitable for installing smart assembly accessories, helping to quickly install flower and plant rigs.', '430.000', '17 '),
	('Tramontina spray', 'Tramontina sprayer you can use to spray nutrient solution, compost, spray pesticides or water your plants. Spray helps your plants stay healthy, prevent harmful pests. With Tramontina Sprayer, caring for your garden becomes more convenient.', '260.000', '18 '),
	('Pliers for cutting branches with protective sheath', 'Pliers with protective sheath PSB-8G+CS with delicate design, ultra-light, making it easy for gardeners to hold and use. Used to cut bonsai, fruit trees, flower trees, in addition to support cutting tree branches.', '210.000', '19 ');
    
    INSERT INTO product_detail (product_name, descriptions, price, product_id ) VALUES
	('Tramontina garden tool kit x3', 'For a small home garden you need the right tools to help with gardening. The Tramontina x3 garden tool kit is a great piece of kit. This tool set makes your garden perfect down to the smallest detail.\nThe tool set includes 3 pieces: garden shovel, garden pitcher, garden rake.', '194.000', '20 ');
    
    
    
    INSERT INTO product_img (product_img, product_id ) VALUES
	('dat_01.jpg', '1 '),
	('dat_02.jpg', '2 '),
	('dat_03.jpg', '3 '),
	('dat_04.jpg', '4 '),
	('phan_05.jpg', '5 '),
	('phan_06.jpg', '6 '),
	('phan_07.jpg', '7 '),
	('hat_08.jpg', '8 '),
	('hat_09.jpg', '9 '),
	('hat_10.jpg', '10 '),
	('hat_11.jpg', '11 '),
	('chau_12.jpg', '12 '),
	('chau_13.jpg', '13 '),
	('chau_14.jpg', '14 '),
	('design_15.jpg', '15 '),
	('design_16.jpg', '16 '),
	('design_17.jpg', '17 '),
	('dc_18.jpg', '18 '),
	('dc_19.jpg', '19 ');
    INSERT INTO product_img (product_img, product_id ) VALUES
	('dc_20.jpg', '20 ');


	-- BOOK
    create table book
    (
    book_id int auto_increment primary key,
    book_name varchar(255),
    book_img varchar(255),
    book_content text,
    post_category_id int,
    FOREIGN KEY (post_category_id) REFERENCES post_category(post_category_id)
    );
    
    insert into book (book_name,book_img,book_content,post_category_id) values
    ('FAQs about flower and bonsai cultivation techniques (volume 1) - Prof. Dr. Tran Van Mao','sach_01.png','Answering the questions to make a beautiful small garden, bringing the fresh, bustling inspiration for us ...','9'),
	('FAQs about flower and bonsai cultivation techniques (episode 2)','sach_02.png','Answering the questions to make a beautiful small garden, bringing a fresh, bustling inspiration for us, mental and motivation for new things.','9'),
	('FAQs about flower and bonsai cultivation techniques (episode 3) - Prof. Dr. Tran Van Mao','sach_03.png','Answering the questions to make a beautiful small garden, bringing a fresh, bustling inspiration for us, mental and motivation for new things.','9'),
	('Wormen','sach_04.png','These products can be very toxic and therefore harmful, so if you want to use them, take\nThis book will teach you how to prepare natural measures with the most popular herbs: Ghost trees, dandelion trees, bell flowers, and many others.','9'),
	('Outdoor space: Garden, simple ideas, color, texture, materials','sach_06.jpg','In this book you will find the best ideas to design a garden in any space\nWhich balcony, terrace, solar energy ... no matter how many meters you have, you can have a place\nPerfect design thanks to Ula Maria, a designer, who was awarded the prize of the Hoang Garden Association Gia in 2018.','9'),
    ('Beautiful garden on small balconies','sach_05.png','In the beautiful garden book on a small balcony, you will learn about:\n+ The world of flowers and plants\n+ Overview knowledge about balcony flower garden art\n+ The secrets of decoration and care for balcony flower garden\n+ Typical balcony flower gardens\n"If humans can vote with flowers and flowers, watch the clouds early in the afternoon"','9');
         
         
         
         
         
         
         select * from comments
         
         