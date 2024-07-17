# Terminal Features Application

This application provides an administrative and user interface for managing invoices and customers. It includes permissions management for creating invoices and auto-charging customers.

## Features

### Admin

- **Create User**: Admin can create new users and assign permissions.
  - Permissions include:
    - Create Invoice only
    - Create Invoice and Autocharge
- **Create Customer**: Admin can create customers.
- **Create Invoice**: Admin can create invoices for any user.
  - Admin can select a customer and enable auto-charge for the invoice.

### User

- **Create Customer**: Users can create their own customers.
- **Transfer Customer**: Users can transfer their customers to other users.
- **Create Invoice**: Users can create invoices.
  - If the user has the necessary permission, they can also enable auto-charge for the invoice.
