output "alb_dns_name"      { value = aws_lb.this.dns_name     description = "Public ALB DNS" }
output "ecs_cluster_name"  { value = aws_ecs_cluster.this.name }
output "ecs_service_name"  { value = aws_ecs_service.svc.name }
output "log_group"         { value = aws_cloudwatch_log_group.app.name }
output "vpc_id"            { value = aws_vpc.this.id }
output "public_subnets"    { value = [aws_subnet.public_a.id, aws_subnet.public_b.id] }
