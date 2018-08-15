export default {
  Title: {
    required: true,
    min: 4,
    max: 255
  },
  Price: {
    required: true,
    regex: '^([0-9.]+)$',
    min_value: 0
  },
  Area: {
    required: true,
    regex: '^([0-9.]+)$',
    min_value: 0
  },
  Country: {
    required: true,
    alpha_spaces: true,
    max: 25
  },
  City: {
    required: true,
    regex: '^([a-zA-Z- ]+)$',
    max: 25
  },
  Postal: {
    numeric: true
  },
  Address: {
    required: true,
    regex: '^([a-zA-Z0-9, ]+)$',
    max: 255
  },
  Latitude: {
    decimal: 7
  },
  Langitude: {
    decimal: 7
  },
  Name: {
    required: true,
    alpha: true,
    max: 25
  },
  Email: {
    email: true,
    max: 25
  },
  Phone: {
    regex: '^([0-9+() ]+)$'
  },
  Photo: {
    image: true
  }
}
