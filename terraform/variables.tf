variable "region"         { description = "AWS region"; type = string; default = "us-east-1" }
variable "project_name"   { description = "Resource base name"; type = string; default = "python-mid-project" }

# Container / app
variable "docker_image"   { description = "Docker image"; type = string; default = "st369712/python-mid-project:latest" }
variable "container_port" { description = "App port"; type = number; default = 5000 }
variable "desired_count"  { description = "Tasks count"; type = number; default = 1 }
variable "cpu"            { description = "Fargate CPU"; type = string; default = "256" }
variable "memory"         { description = "Fargate Memory (MB)"; type = string; default = "512" }
variable "health_check_path" { description = "ALB healthcheck path"; type = string; default = "/" }
variable "container_env" {
  description = "ENV variables for container"
  type = list(object({ name = string, value = string }))
  default = []
}

# Networking
variable "vpc_cidr" { description = "VPC CIDR"; type = string; default = "10.10.0.0/16" }
variable "public_subnet_cidrs" {
  description = "Two public subnets CIDRs"
  type        = list(string)
  default     = ["10.10.1.0/24", "10.10.2.0/24"]
}
