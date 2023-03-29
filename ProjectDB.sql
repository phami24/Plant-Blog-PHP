CREATE DATABASE garden_world;


USE garden_world;

-- Admin Account 
CREATE TABLE admin 
(
	admin_id int auto_increment primary key,
    username varchar(255),
    password varchar(255)
);

-- Custommers Account

CREATE TABLE custommers 
(
	custommer_id int auto_increment primary key,
	full_name varchar(255),
    username varchar(300),
    password varchar(300),
    email varchar(255),
    phone varchar(255)
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

CREATE TABLE comments
(
	comment_id int auto_increment primary key ,
    custommer_id int,
    comment text ,
	post_id int,
    created_at DATETIME default CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES post(post_id),
    FOREIGN KEY (custommer_id) REFERENCES custommers(custommer_id)
);

UPDATE post
SET status = 1 
WHERE post_category_id = 2;

CREATE VIEW comment_view AS
SELECT  created_at ,full_name , comment 
FROM custommers 
INNER JOIN comments
ON custommers.custommer_id = comments.custommer_id;

DROP VIEW comment_view;

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
'Tỉnh dậy ở một nơi thật xa, xung quanh chỉ có cây cỏ và chim muông, cảm thấy tinh thần sảng khoái, dễ chịu vô cùng.'
),
(
'Banner2.jpg',
'Tỉnh dậy ở một nơi thật xa, xung quanh chỉ có cây cỏ và chim muông, cảm thấy tinh thần sảng khoái, dễ chịu vô cùng.'
);


select * from post;
SELECT * FROM post WHERE post_category_id = 2  AND status =1;
-- Tips
INSERT INTO post (title, post_img, post_category_id) 
VALUES
	('3 steps to create a bed garden', '1101.jpg', '2 '),
	('5 Notes When Choosing Pots For Planting', '1102.jpg', '2 '),
	('8 ways to use orange peels, tangerines need to know', '1103.jpg', '2 '),
	('The following 9 tips will help you create a lush garden', '1104.jpg', '2 '),
	('12 effects of vinegar', '1105.jpg', '2 '),
	('15 great tips to save money when gardening', '1106.jpg', '2 '),
	('How to check PH level at home', '1107.jpg', '2 '),
	('5 natural ways to remove weeds from your garden', '1108.jpg', '2 '),
	('Organic fertilizers you can make at home', '1109.jpg', '2 '),
	('How to make a simple pesticide you can make at home', '1110.jpg', '2 '),
	('Balcony standing gardening new ideas', '1111.jpg', '2 '),
	('Create a big garden in a small space', '1112.jpg', '2 ');


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
	('3201.jpg', '12 '),
	('null', '13 '),
	('3203.jpg', '14 '),
	('3204.jpg', '15 '),
	('3205.jpg', '16 '),
	('null', '17 '),
	('3207.jpg', '18 '),
	('null', '19 ');
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('4201.jpg', '20 '),
	('4202.jpg', '21 '),
	('4203.jpg', '22 '),
	('null', '23 '),
	('4205.jpg', '24 '),
	('4206.jpg', '25 '),
	('null', '26 '),
	('4208.jpg', '27 '),
	('4209.jpg', '28 '),
	('null', '29 '),
	('5201.jpg', '30 '),
	('null', '31 '),
	('null', '32 '),
	('5204.jpg', '33 '),
	('null', '34 '),
	('5206.jpg', '35 '),
	('null', '36 '),
	('null', '37 '),
	('5209.jpg', '38 ');
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('null', '39 '),
	('null', '40 '),
	('5112.jpg', '41 '),
	('6201.jpg', '42 '),
	('6202.jpg', '43 '),
	('null', '44 '),
	('6204.jpg', '45 '),
	('6205.jpg', '46 '),
	('6206.jpg', '47 '),
	('6207.jpg', '48 '),
	('null', '49 '),
	('6209.jpg', '50 '),
	('null', '51 '),
	('null', '52 '),
	('6212.jpg', '53 '),
	('6213.jpg', '54 '),
	('6214.jpg', '55 '),
	('6215.jpg', '56 '),
	('null', '57 ');
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('7201.jpg', '58 '),
	('null', '59 '),
	('null', '60 '),
	('8200.jpg', '61 '),
	('null', '62 '),
	('8201.jpg', '63 '),
	('8202.jpg', '64 '),
	('8203.jpg', '65 '),
	('null', '66 '),
	('null', '67 '),
	('null', '68 '),
	('null', '69 '),
	('null', '70 '),
	('null', '71 '),
	('null', '72 '),
	('null', '73 '),
	('9205.jpg', '74 '),
	('null', '75 '),
	('null', '76 ');
    
    INSERT INTO topics_img (img_url, topic_id) VALUES
	('10201.jpg', '77 '),
	('null', '78 '),
	('null', '79 '),
	('null', '80 '),
	('11201.jpg', '81 '),
	('11202.jpg', '82 '),
	('11203.jpg', '83 '),
	('11204.jpg', '84 '),
	('11205.jpg', '85 '),
	('11206.jpg', '86 '),
	('11207.jpg', '87 '),
	('11208.jpg', '88 '),
	('11209.jpg', '89 '),
	('11210.jpg', '90 '),
	('null', '91 '),
	('12201.jpg', '92 '),
	('12202.jpg', '93 '),
	('12203.jpg', '94 '),
	('11204.jpg', '95 '),
    ('11205.jpg','96');
    
    select * FROM topics_img
    