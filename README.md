# eArtworks

Lightweight Online Gallery for artists.

# About

eArtworks is an online gallery and marketplace for artists' works, regardless of their nationality, gender, or other specific criteria.
by way of auction. Makers like painters, writers, and musicians have a wealth of options in the age of internet enterprise.
artists and designers to get support for their artistic endeavors as well as to make a living by selling their works online.

# Known issues / bugs so far

1. Only imports goods from a single vendor and a single category. <br>
2. The system generates the password "Demo123@" for all staff accounts and bulk imported users. <br>
3. The system uses the default picture for products imported without images. <br>
4. To save storage space, all submitted XLS files are erased prior to processing. <br>
5. Since there is no facility for staff accounts to validate their emails, it is assumed that all staff emails are legitimate. <br>
6. After a user logs out, the cart is no longer saved. By default, the logout session deletes the clearing cart. <br>
7. The fixed rate for delivery fees is $15; this is hard programmed. Later, it ought to be updated. <br>
8. All prices are in Kenyan Shillings; dynamic pricing is not yet in place. <br>
9. Estimated delivery date is one week (7 Days) from the day you made your order. <br>
10. All unpaid orders can be marked as paid on back office module with cash as the default payment means.
11. Careful on editing Third Party Api`s it will break entire payment process, Only change tokens not names.
12. Top selling products - Returns Null if there are no available products.

# To Do`s

1. Force 2547123456789 format on all phone numbers. <br>
2. Optimize mobile payments logic. Its unstable. <br>
3. Seller dashboard. <br>
4. Notify seller after a customer orders a product. <br>
5. Add reports module - Reports In XLS, PDF, and .Docx <br>
6. Add Charts, Indicate sales / Purchases. <br>
