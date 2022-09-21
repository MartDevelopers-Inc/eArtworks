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
10. All unpaid orders can be marked as paid on back office module with cash as the default payment means. <br>
11. Careful on editing Third Party Api`s it will break entire payment process, Only change tokens not names.<br>
12. Top selling products - Returns Null if there are no available products. <br>
13. Seller Dashboard - Payments logic needs to be optimized, its fetching orders and payments based on their order codes. <br>

# To Do`s

1. Optimize mobile payments logic. Its unstable. <br>
2. Seller dashboard. <br>
3. Notify seller after a customer orders a product. <br>
4. Add Charts, Indicate sales / Purchases. <br>
